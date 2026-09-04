"use strict";

const CERT_DEFAULTS = [
  { enabled: true, text: "SuiteFoundation Certified" },
  { enabled: true, text: "Authorized ARM and Multi-Book Consultant" },
  { enabled: true, text: "Certified ERP Consultant" },
  { enabled: false, text: "" }
];

const SIZE_PROFILES = {
  compact: {
    width: 540, left: 285, right: 255, inset: 12, badgeGap: 8,
    name: 22, nameLine: 27, title: 15, titleLine: 20,
    contact: 15, contactLine: 20, website: 16, websiteLine: 20,
    social: 28, allianceW: 88, allianceH: 52, solutionW: 154, solutionH: 52,
    bannerH: 80, cert: 13, certLine: 19, dotPad: 7,
    action: 14, actionLine: 20, actionIcon: 26, actionGap: 10,
    topPad: 9, midTop: 11, midBottom: 12, bannerBottom: 8, certBottom: 7, actionTop: 8, actionBottom: 8
  },
  standard: {
    width: 620, left: 330, right: 290, inset: 14, badgeGap: 10,
    name: 24, nameLine: 29, title: 17, titleLine: 22,
    contact: 17, contactLine: 22, website: 18, websiteLine: 22,
    social: 32, allianceW: 100, allianceH: 59, solutionW: 175, solutionH: 59,
    bannerH: 92, cert: 14, certLine: 20, dotPad: 8,
    action: 15, actionLine: 21, actionIcon: 28, actionGap: 12,
    topPad: 10, midTop: 12, midBottom: 13, bannerBottom: 9, certBottom: 8, actionTop: 9, actionBottom: 9
  },
  large: {
    width: 700, left: 375, right: 325, inset: 16, badgeGap: 11,
    name: 28, nameLine: 34, title: 19, titleLine: 25,
    contact: 19, contactLine: 25, website: 20, websiteLine: 25,
    social: 36, allianceW: 112, allianceH: 66, solutionW: 196, solutionH: 66,
    bannerH: 104, cert: 16, certLine: 22, dotPad: 9,
    action: 17, actionLine: 23, actionIcon: 32, actionGap: 14,
    topPad: 11, midTop: 13, midBottom: 14, bannerBottom: 10, certBottom: 9, actionTop: 10, actionBottom: 10
  }
};

const $ = (id) => document.getElementById(id);

function escapeHtml(value) {
  return String(value || "")
    .replace(/&/g, "&amp;")
    .replace(/</g, "&lt;")
    .replace(/>/g, "&gt;")
    .replace(/"/g, "&quot;")
    .replace(/'/g, "&#039;");
}

function normaliseUrl(value) {
  const v = String(value || "").trim();
  if (!v) return "";
  if (/^(https?:|mailto:|tel:)/i.test(v)) return v;
  return "https://" + v.replace(/^\/+/, "");
}

function getAssetBase() {
  const manual = $("assetBase").value.trim();
  if (manual) return manual.replace(/\/$/, "") + "/";
  return new URL("assets/", window.location.href).href;
}

function assetUrl(filename) { return getAssetBase() + filename; }
function currentBannerFilename() { return $("bannerTheme").value === "dark" ? "n2lab-signature-banner-dark.png" : "n2lab-signature-banner.png"; }
function getProfile() { return SIZE_PROFILES[$("signatureSize").value] || SIZE_PROFILES.standard; }

function imgTag(src, alt, width, height) {
  return `<img src="${escapeHtml(src)}" alt="${escapeHtml(alt)}" width="${width}" height="${height}" style="display:block;border:0;outline:none;text-decoration:none;width:${width}px;height:${height}px;">`;
}

function partnerBadge(show, filename, alt, width, height, leftPad) {
  if (!show) return "";
  return `<td style="vertical-align:top;padding-left:${leftPad}px;">${imgTag(assetUrl(filename), alt, width, height)}</td>`;
}

function socialIcon(url, filename, alt, size) {
  if (!url) return "";
  return `<td style="padding:0 4px 0 0;vertical-align:middle;"><a href="${escapeHtml(normaliseUrl(url))}" target="_blank" style="text-decoration:none;">${imgTag(assetUrl(filename), alt, size, size)}</a></td>`;
}

function getCertifications() {
  const items = [];
  for (let i = 0; i < 4; i += 1) {
    if ($(`certEnabled${i}`).checked) {
      const text = $(`certText${i}`).value.trim();
      if (text) items.push(text);
    }
  }
  return items;
}

function certificationHtml(items, profile) {
  return items.map((item, index) => {
    const dot = index === 0 ? "" : `<span style="color:#fc3c32;font-weight:700;padding:0 ${profile.dotPad}px;">&bull;</span>`;
    return `${dot}<span>${escapeHtml(item)}</span>`;
  }).join("");
}

function actionRowHtml(p) {
  const showBooking = $("showBooking").checked && $("bookingText").value.trim() && $("bookingUrl").value.trim();
  const showAway = $("showAway").checked && ($("awayLabel").value.trim() || $("awayDates").value.trim());
  if (!showBooking && !showAway) return "";

  const booking = showBooking ? `
    <td style="vertical-align:middle;padding:0 ${p.actionGap}px 0 0;">
      <table role="presentation" cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse;"><tr>
        <td style="vertical-align:middle;padding:0 3px 0 0;">${imgTag(assetUrl("calendar.png"), "Book a meeting", p.actionIcon, p.actionIcon)}</td>
        <td style="vertical-align:middle;font-size:${p.action}px;line-height:${p.actionLine}px;font-weight:400;white-space:nowrap;">
          <a href="${escapeHtml(normaliseUrl($("bookingUrl").value))}" target="_blank" style="color:#111111;text-decoration:none;">${escapeHtml($("bookingText").value.trim())}</a>
        </td>
      </tr></table>
    </td>` : "";

  const awayLabel = escapeHtml($("awayLabel").value.trim());
  const awayDates = escapeHtml($("awayDates").value.trim());
  const awayText = [awayLabel, awayDates].filter(Boolean).join(awayLabel && awayDates ? ": " : "");
  const away = showAway ? `
    <td style="vertical-align:middle;padding:0;">
      <table role="presentation" cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse;"><tr>
        <td style="vertical-align:middle;padding:0 3px 0 0;">${imgTag(assetUrl("away.png"), "Travel or PTO", p.actionIcon, p.actionIcon)}</td>
        <td style="vertical-align:middle;font-size:${p.action}px;line-height:${p.actionLine}px;color:#111111;white-space:nowrap;">${awayText}</td>
      </tr></table>
    </td>` : "";

  return `
  <tr>
    <td colspan="2" style="padding:${p.actionTop}px 0 ${p.actionBottom}px 0;border-top:1px solid #aeb2b5; border-bottom:1px solid #aeb2b5;">
      <table role="presentation" cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse;"><tr>${booking}${away}</tr></table>
    </td>
  </tr>`;
}

function signatureHtml() {
  const p = getProfile();
  const name = escapeHtml($("name").value);
  const title = escapeHtml($("title").value);
  const emailRaw = $("email").value.trim();
  const mobileRaw = $("mobile").value.trim();
  const website = escapeHtml($("website").value);
  const websiteUrl = escapeHtml(normaliseUrl($("websiteUrl").value));
  const certs = getCertifications();

  const alliance = partnerBadge($("showAlliance").checked,"netsuite-alliance-partner.png","Oracle NetSuite Alliance Partner",p.allianceW,p.allianceH,p.inset);
  const solution = partnerBadge($("showSolution").checked,"netsuite-solution-provider-partner.png","Oracle NetSuite Solution Provider Partner",p.solutionW,p.solutionH,p.badgeGap);

  const social = [
    socialIcon($("linkedin").value.trim(), "linkedin.png", "LinkedIn", p.social),
    socialIcon($("instagram").value.trim(), "instagram.png", "Instagram", p.social),
    socialIcon($("facebook").value.trim(), "facebook.png", "Facebook", p.social),
    socialIcon($("xurl").value.trim(), "x.png", "X", p.social)
  ].join("");

  const email = escapeHtml(emailRaw);
  const phone = escapeHtml(mobileRaw);
  const phoneHref = escapeHtml(mobileRaw.replace(/[^+\d]/g, ""));
  const emailLine = emailRaw ? `<a href="mailto:${email}" style="color:#111111;text-decoration:none;">${email}</a>` : "";
  const phoneLine = mobileRaw ? `<a href="tel:${phoneHref}" style="color:#111111;text-decoration:none;">${phone}</a>` : "";
  const bannerFile = currentBannerFilename();
  const bannerAlt = $("bannerTheme").value === "dark" ? "N2 Lab — NetSuite. Delivered. dark banner" : "N2 Lab — NetSuite. Delivered. light banner";

  return `
<table role="presentation" cellpadding="0" cellspacing="0" border="0" width="${p.width}" style="width:${p.width}px;max-width:${p.width}px;border-collapse:collapse;font-family:Arial,Helvetica,sans-serif;color:#111111;background:#ffffff;">
  <tr>
    <td colspan="2" style="padding:0 0 ${p.topPad}px 0;border-bottom:1px solid #aeb2b5;">
      <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="${p.width}" style="width:${p.width}px;border-collapse:collapse;table-layout:fixed;">
        <tr>
          <td width="${p.left}" style="width:${p.left}px;vertical-align:top;padding:0 12px 0 0;">
            <div style="font-size:${p.name}px;line-height:${p.nameLine}px;font-weight:700;color:#111111;">${name}</div>
            <div style="font-size:${p.title}px;line-height:${p.titleLine}px;font-weight:400;color:#111111;padding-top:1px;">${title}</div>
          </td>
          <td width="${p.right}" align="left" style="width:${p.right}px;vertical-align:top;padding-left:0;">
            <table role="presentation" cellpadding="0" cellspacing="0" border="0" align="left" style="border-collapse:collapse;"><tr>${alliance}${solution}</tr></table>
          </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td width="${p.left}" style="width:${p.left}px;vertical-align:top;padding:${p.midTop}px 12px ${p.midBottom}px 0;">
      <div style="font-size:${p.contact}px;line-height:${p.contactLine}px;color:#111111;"><strong>E:</strong>&nbsp; ${emailLine}</div>
      <div style="font-size:${p.contact}px;line-height:${p.contactLine}px;color:#111111;padding-top:4px;"><strong>M:</strong>&nbsp; ${phoneLine}</div>
    </td>
    <td width="${p.right}" align="left" style="width:${p.right}px;vertical-align:top;padding:${p.midTop}px 0 ${p.midBottom}px ${p.inset}px;">
      <table role="presentation" cellpadding="0" cellspacing="0" border="0" align="left" style="border-collapse:collapse;"><tr>${social}</tr></table>
      <div style="clear:both;font-size:${p.website}px;line-height:${p.websiteLine}px;font-weight:700;padding-top:3px;text-align:left;"><a href="${websiteUrl}" target="_blank" style="color:#111111;text-decoration:none;">${website}</a></div>
    </td>
  </tr>
  <tr>
    <td colspan="2" style="padding:0 0 ${p.bannerBottom}px 0;">
      <a href="${websiteUrl}" target="_blank" style="text-decoration:none;">${imgTag(assetUrl(bannerFile), bannerAlt, p.width, p.bannerH)}</a>
    </td>
  </tr>
  <tr>
    <td colspan="2" style="font-size:${p.cert}px;line-height:${p.certLine}px;padding:0 0 ${p.certBottom}px 0;color:#111111;">
      ${certificationHtml(certs, p)}
    </td>
  </tr>
  ${actionRowHtml(p)}
</table>`.trim();
}

function updateOptionStates() {
  $("bookingBox").classList.toggle("is-disabled", !$("showBooking").checked);
  $("bookingText").disabled = !$("showBooking").checked;
  $("bookingUrl").disabled = !$("showBooking").checked;
  $("awayBox").classList.toggle("is-disabled", !$("showAway").checked);
  $("awayLabel").disabled = !$("showAway").checked;
  $("awayDates").disabled = !$("showAway").checked;
}

function update() {
  updateOptionStates();
  const html = signatureHtml();
  $("signaturePreview").innerHTML = html;
  $("htmlOutput").value = html;
}

async function copyRich() {
  const html = signatureHtml();
  const plain = $("signaturePreview").innerText;
  try {
    if (window.ClipboardItem && navigator.clipboard && navigator.clipboard.write) {
      const item = new ClipboardItem({
        "text/html": new Blob([html], { type: "text/html" }),
        "text/plain": new Blob([plain], { type: "text/plain" })
      });
      await navigator.clipboard.write([item]);
    } else {
      const range = document.createRange();
      range.selectNodeContents($("signaturePreview"));
      const selection = window.getSelection();
      selection.removeAllRanges();
      selection.addRange(range);
      document.execCommand("copy");
      selection.removeAllRanges();
    }
    setStatus("Rich signature copied. Paste it into your email signature editor.");
  } catch (error) {
    console.error(error);
    setStatus("Copy was blocked. Select the preview manually and copy it.");
  }
}

async function copyHtml() {
  try { await navigator.clipboard.writeText(signatureHtml()); setStatus("HTML code copied."); }
  catch (error) { const box=$("htmlOutput"); box.focus(); box.select(); document.execCommand("copy"); setStatus("HTML code copied."); }
}

function downloadHtml() {
  const documentHtml = "<!doctype html><html><head><meta charset=\"utf-8\"><title>N2 Lab Email Signature</title></head><body>" + signatureHtml() + "</body></html>";
  const blob = new Blob([documentHtml], { type: "text/html;charset=utf-8" });
  const url = URL.createObjectURL(blob);
  const anchor = document.createElement("a");
  const filename = ($("name").value || "n2lab-employee").toLowerCase().replace(/[^a-z0-9]+/g, "-").replace(/^-|-$/g, "");
  anchor.href = url; anchor.download = filename + "-email-signature.html"; document.body.appendChild(anchor); anchor.click(); anchor.remove(); URL.revokeObjectURL(url);
  setStatus("HTML file downloaded.");
}

function resetSample() {
  $("name").value="Steven Chen"; $("title").value="Partner / Solution Architect"; $("email").value="steven.chen@n2lab.io"; $("mobile").value="669-696-5715";
  $("website").value="www.n2lab.io"; $("websiteUrl").value="https://www.n2lab.io"; $("showAlliance").checked=true; $("showSolution").checked=true;
  $("linkedin").value="https://www.linkedin.com"; $("instagram").value="https://www.instagram.com"; $("facebook").value="https://www.facebook.com"; $("xurl").value="https://x.com";
  $("showBooking").checked=true; $("bookingText").value="Book a time with me"; $("bookingUrl").value="https://calendly.com/";
  $("showAway").checked=true; $("awayLabel").value="Away"; $("awayDates").value="August, 12 - 23";
  $("signatureSize").value="standard"; $("bannerTheme").value="light"; $("assetBase").value="";
  CERT_DEFAULTS.forEach((item,index)=>{ $(`certEnabled${index}`).checked=item.enabled; $(`certText${index}`).value=item.text; });
  update(); setStatus("Sample values restored.");
}

function setStatus(message) {
  $("status").textContent=message; window.clearTimeout(window.__n2StatusTimer); window.__n2StatusTimer=window.setTimeout(()=>{ $("status").textContent=""; },5000);
}

function initialise() {
  document.querySelectorAll("input, select").forEach((element)=>{ element.addEventListener("input",update); element.addEventListener("change",update); });
  $("copyRich").addEventListener("click",copyRich); $("copyHtml").addEventListener("click",copyHtml); $("downloadHtml").addEventListener("click",downloadHtml); $("resetSample").addEventListener("click",resetSample);
  update();
}

document.addEventListener("DOMContentLoaded", initialise);
