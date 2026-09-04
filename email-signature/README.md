# N2 Lab Email Signature Generator — Server Version

This version separates HTML, CSS and JavaScript into different files. It avoids the oversized inline script used by the previous build and is better suited for hosting on a normal web server.

## Upload structure
Upload the complete contents of this folder without renaming the files:

- `index.html`
- `styles.css`
- `app.js`
- `assets/`
  - `n2lab-signature-banner.png`
  - `n2lab-signature-banner-dark.png`
  - partner badge images
  - social icons

Recommended location:

`https://www.n2lab.io/email-signature/`

The generator automatically detects:

`https://www.n2lab.io/email-signature/assets/`

## Why this fixes the missing preview and certification controls
The earlier generator stored a very large JavaScript block and embedded image data inside `index.html`. On the live server, that script did not execute correctly. This server build loads `app.js` as a separate same-origin file, and the four certification controls are also present directly in the HTML.

## After uploading
1. Replace the old files completely.
2. Upload the entire `assets` folder.
3. Clear the website/CDN cache.
4. Hard-refresh the page.
5. Open the browser developer console and confirm there are no 404 errors for `app.js`, `styles.css` or image assets.

## Email deployment
Use **Copy rich signature**. The generated signature uses absolute hosted image URLs, which are more reliable in Outlook and Gmail than Base64 images.
