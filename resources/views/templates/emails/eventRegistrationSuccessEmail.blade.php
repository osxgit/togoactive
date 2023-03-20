<!DOCTYPE html>
<html lang="en">
<head>
<style>
  /*
! tailwindcss v3.2.4 | MIT License | https://tailwindcss.com
*//*
1. Prevent padding and border from affecting element width. (https://github.com/mozdevs/cssremedy/issues/4)
2. Allow adding a border to an element by just adding a border-width. (https://github.com/tailwindcss/tailwindcss/pull/116)
*/

*,
::before,
::after {
  box-sizing: border-box; /* 1 */
  border-width: 0; /* 2 */
  border-style: solid; /* 2 */
  border-color: #E5E7EB; /* 2 */
}

::before,
::after {
  --tw-content: '';
}

/*
1. Use a consistent sensible line-height in all browsers.
2. Prevent adjustments of font size after orientation changes in iOS.
3. Use a more readable tab size.
4. Use the user's configured `sans` font-family by default.
5. Use the user's configured `sans` font-feature-settings by default.
*/

html {
  line-height: 1.5; /* 1 */
  -webkit-text-size-adjust: 100%; /* 2 */
  -moz-tab-size: 4; /* 3 */
  -o-tab-size: 4;
     tab-size: 4; /* 3 */
  font-family: Inter, ui-sans-serif, system-ui, -apple-system, system-ui, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji; /* 4 */
  font-feature-settings: normal; /* 5 */
}

/*
1. Remove the margin in all browsers.
2. Inherit line-height from `html` so users can set them as a class directly on the `html` element.
*/

body {
  margin: 0; /* 1 */
  line-height: inherit; /* 2 */
}

/*
1. Add the correct height in Firefox.
2. Correct the inheritance of border color in Firefox. (https://bugzilla.mozilla.org/show_bug.cgi?id=190655)
3. Ensure horizontal rules are visible by default.
*/

hr {
  height: 0; /* 1 */
  color: inherit; /* 2 */
  border-top-width: 1px; /* 3 */
}

/*
Add the correct text decoration in Chrome, Edge, and Safari.
*/

abbr:where([title]) {
  -webkit-text-decoration: underline dotted;
          text-decoration: underline dotted;
}

/*
Remove the default font size and weight for headings.
*/

h1,
h2,
h3,
h4,
h5,
h6 {
  font-size: inherit;
  font-weight: inherit;
}

/*
Reset links to optimize for opt-in styling instead of opt-out.
*/

a {
  color: inherit;
  text-decoration: inherit;
}

/*
Add the correct font weight in Edge and Safari.
*/

b,
strong {
  font-weight: bolder;
}

/*
1. Use the user's configured `mono` font family by default.
2. Correct the odd `em` font sizing in all browsers.
*/

code,
kbd,
samp,
pre {
  font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, Liberation Mono, Courier New, monospace; /* 1 */
  font-size: 1em; /* 2 */
}

/*
Add the correct font size in all browsers.
*/

small {
  font-size: 80%;
}

/*
Prevent `sub` and `sup` elements from affecting the line height in all browsers.
*/

sub,
sup {
  font-size: 75%;
  line-height: 0;
  position: relative;
  vertical-align: baseline;
}

sub {
  bottom: -0.25em;
}

sup {
  top: -0.5em;
}

/*
1. Remove text indentation from table contents in Chrome and Safari. (https://bugs.chromium.org/p/chromium/issues/detail?id=999088, https://bugs.webkit.org/show_bug.cgi?id=201297)
2. Correct table border color inheritance in all Chrome and Safari. (https://bugs.chromium.org/p/chromium/issues/detail?id=935729, https://bugs.webkit.org/show_bug.cgi?id=195016)
3. Remove gaps between table borders by default.
*/

table {
  text-indent: 0; /* 1 */
  border-color: inherit; /* 2 */
  border-collapse: collapse; /* 3 */
}

/*
1. Change the font styles in all browsers.
2. Remove the margin in Firefox and Safari.
3. Remove default padding in all browsers.
*/

button,
input,
optgroup,
select,
textarea {
  font-family: inherit; /* 1 */
  font-size: 100%; /* 1 */
  font-weight: inherit; /* 1 */
  line-height: inherit; /* 1 */
  color: inherit; /* 1 */
  margin: 0; /* 2 */
  padding: 0; /* 3 */
}

/*
Remove the inheritance of text transform in Edge and Firefox.
*/

button,
select {
  text-transform: none;
}

/*
1. Correct the inability to style clickable types in iOS and Safari.
2. Remove default button styles.
*/

button,
[type='button'],
[type='reset'],
[type='submit'] {
  -webkit-appearance: button; /* 1 */
  background-color: transparent; /* 2 */
  background-image: none; /* 2 */
}

/*
Use the modern Firefox focus style for all focusable elements.
*/

:-moz-focusring {
  outline: auto;
}

/*
Remove the additional `:invalid` styles in Firefox. (https://github.com/mozilla/gecko-dev/blob/2f9eacd9d3d995c937b4251a5557d95d494c9be1/layout/style/res/forms.css#L728-L737)
*/

:-moz-ui-invalid {
  box-shadow: none;
}

/*
Add the correct vertical alignment in Chrome and Firefox.
*/

progress {
  vertical-align: baseline;
}

/*
Correct the cursor style of increment and decrement buttons in Safari.
*/

::-webkit-inner-spin-button,
::-webkit-outer-spin-button {
  height: auto;
}

/*
1. Correct the odd appearance in Chrome and Safari.
2. Correct the outline style in Safari.
*/

[type='search'] {
  -webkit-appearance: textfield; /* 1 */
  outline-offset: -2px; /* 2 */
}

/*
Remove the inner padding in Chrome and Safari on macOS.
*/

::-webkit-search-decoration {
  -webkit-appearance: none;
}

/*
1. Correct the inability to style clickable types in iOS and Safari.
2. Change font properties to `inherit` in Safari.
*/

::-webkit-file-upload-button {
  -webkit-appearance: button; /* 1 */
  font: inherit; /* 2 */
}

/*
Add the correct display in Chrome and Safari.
*/

summary {
  display: list-item;
}

/*
Removes the default spacing and border for appropriate elements.
*/

blockquote,
dl,
dd,
h1,
h2,
h3,
h4,
h5,
h6,
hr,
figure,
p,
pre {
  margin: 0;
}

fieldset {
  margin: 0;
  padding: 0;
}

legend {
  padding: 0;
}

ol,
ul,
menu {
  list-style: none;
  margin: 0;
  padding: 0;
}

/*
Prevent resizing textareas horizontally by default.
*/

textarea {
  resize: vertical;
}

/*
1. Reset the default placeholder opacity in Firefox. (https://github.com/tailwindlabs/tailwindcss/issues/3300)
2. Set the default placeholder color to the user's configured gray 400 color.
*/

input::-moz-placeholder, textarea::-moz-placeholder {
  opacity: 1; /* 1 */
  color: #9CA3AF; /* 2 */
}

input::placeholder,
textarea::placeholder {
  opacity: 1; /* 1 */
  color: #9CA3AF; /* 2 */
}

/*
Set the default cursor for buttons.
*/

button,
[role="button"] {
  cursor: pointer;
}

/*
Make sure disabled buttons don't get the pointer cursor.
*/
:disabled {
  cursor: default;
}

/*
1. Make replaced elements `display: block` by default. (https://github.com/mozdevs/cssremedy/issues/14)
2. Add `vertical-align: middle` to align replaced elements more sensibly by default. (https://github.com/jensimmons/cssremedy/issues/14#issuecomment-634934210)
   This can trigger a poorly considered lint error in some tools but is included by design.
*/

img,
svg,
video,
canvas,
audio,
iframe,
embed,
object {
  display: block; /* 1 */
  vertical-align: middle; /* 2 */
}

/*
Constrain images and videos to the parent width and preserve their intrinsic aspect ratio. (https://github.com/mozdevs/cssremedy/issues/14)
*/

img,
video {
  max-width: 100%;
  height: auto;
}

/* Make elements with the HTML hidden attribute stay hidden by default */
[hidden] {
  display: none;
}

[type='text'],[type='email'],[type='url'],[type='password'],[type='number'],[type='date'],[type='datetime-local'],[type='month'],[type='search'],[type='tel'],[type='time'],[type='week'],[multiple],textarea,select {
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
  background-color: #fff;
  border-color: #6B7280;
  border-width: 1px;
  border-radius: 0px;
  padding-top: 0.5rem;
  padding-right: 0.75rem;
  padding-bottom: 0.5rem;
  padding-left: 0.75rem;
  font-size: 1rem;
  line-height: 1.5rem;
  --tw-shadow: 0 0 #0000;
}

[type='text']:focus, [type='email']:focus, [type='url']:focus, [type='password']:focus, [type='number']:focus, [type='date']:focus, [type='datetime-local']:focus, [type='month']:focus, [type='search']:focus, [type='tel']:focus, [type='time']:focus, [type='week']:focus, [multiple]:focus, textarea:focus, select:focus {
  outline: 2px solid transparent;
  outline-offset: 2px;
  --tw-ring-inset: var(--tw-empty,/*!*/ /*!*/);
  --tw-ring-offset-width: 0px;
  --tw-ring-offset-color: #fff;
  --tw-ring-color: #1C64F2;
  --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
  --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);
  box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow);
  border-color: #1C64F2;
}

input::-moz-placeholder, textarea::-moz-placeholder {
  color: #6B7280;
  opacity: 1;
}

input::placeholder,textarea::placeholder {
  color: #6B7280;
  opacity: 1;
}

::-webkit-datetime-edit-fields-wrapper {
  padding: 0;
}

::-webkit-date-and-time-value {
  min-height: 1.5em;
}

select:not([size]) {
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236B7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
  background-position: right 0.5rem center;
  background-repeat: no-repeat;
  background-size: 1.5em 1.5em;
  padding-right: 2.5rem;
  -webkit-print-color-adjust: exact;
          print-color-adjust: exact;
}

[multiple] {
  background-image: initial;
  background-position: initial;
  background-repeat: unset;
  background-size: initial;
  padding-right: 0.75rem;
  -webkit-print-color-adjust: unset;
          print-color-adjust: unset;
}

[type='checkbox'],[type='radio'] {
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
  padding: 0;
  -webkit-print-color-adjust: exact;
          print-color-adjust: exact;
  display: inline-block;
  vertical-align: middle;
  background-origin: border-box;
  -webkit-user-select: none;
     -moz-user-select: none;
          user-select: none;
  flex-shrink: 0;
  height: 1rem;
  width: 1rem;
  color: #1C64F2;
  background-color: #fff;
  border-color: #6B7280;
  border-width: 1px;
  --tw-shadow: 0 0 #0000;
}

[type='checkbox'] {
  border-radius: 0px;
}

[type='radio'] {
  border-radius: 100%;
}

[type='checkbox']:focus,[type='radio']:focus {
  outline: 2px solid transparent;
  outline-offset: 2px;
  --tw-ring-inset: var(--tw-empty,/*!*/ /*!*/);
  --tw-ring-offset-width: 2px;
  --tw-ring-offset-color: #fff;
  --tw-ring-color: #1C64F2;
  --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
  --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);
  box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow);
}

[type='checkbox']:checked,[type='radio']:checked,.dark [type='checkbox']:checked,.dark [type='radio']:checked {
  border-color: transparent;
  background-color: currentColor;
  background-size: 100% 100%;
  background-position: center;
  background-repeat: no-repeat;
}

[type='checkbox']:checked {
  background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3cpath d='M12.207 4.793a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0l-2-2a1 1 0 011.414-1.414L6.5 9.086l4.293-4.293a1 1 0 011.414 0z'/%3e%3c/svg%3e");
}

[type='radio']:checked {
  background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3ccircle cx='8' cy='8' r='3'/%3e%3c/svg%3e");
}

[type='checkbox']:indeterminate {
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 16 16'%3e%3cpath stroke='white' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M4 8h8'/%3e%3c/svg%3e");
  border-color: transparent;
  background-color: currentColor;
  background-size: 100% 100%;
  background-position: center;
  background-repeat: no-repeat;
}

[type='checkbox']:indeterminate:hover,[type='checkbox']:indeterminate:focus {
  border-color: transparent;
  background-color: currentColor;
}

[type='file'] {
  background: unset;
  border-color: inherit;
  border-width: 0;
  border-radius: 0;
  padding: 0;
  font-size: unset;
  line-height: inherit;
}

[type='file']:focus {
  outline: 1px auto inherit;
}

input[type=file]::file-selector-button {
  color: white;
  background: #1F2937;
  border: 0;
  font-weight: 500;
  font-size: 0.875rem;
  cursor: pointer;
  padding-top: 0.625rem;
  padding-bottom: 0.625rem;
  padding-left: 2rem;
  padding-right: 1rem;
  -webkit-margin-start: -1rem;
          margin-inline-start: -1rem;
  -webkit-margin-end: 1rem;
          margin-inline-end: 1rem;
}

input[type=file]::file-selector-button:hover {
  background: #374151;
}

.dark input[type=file]::file-selector-button {
  color: white;
  background: #4B5563;
}

.dark input[type=file]::file-selector-button:hover {
  background: #6B7280;
}

input[type="range"]::-webkit-slider-thumb {
  height: 1.25rem;
  width: 1.25rem;
  background: #1C64F2;
  border-radius: 9999px;
  border: 0;
  appearance: none;
  -moz-appearance: none;
  -webkit-appearance: none;
  cursor: pointer;
}

input[type="range"]:disabled::-webkit-slider-thumb {
  background: #9CA3AF;
}

.dark input[type="range"]:disabled::-webkit-slider-thumb {
  background: #6B7280;
}

input[type="range"]:focus::-webkit-slider-thumb {
  outline: 2px solid transparent;
  outline-offset: 2px;
  --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
  --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(4px + var(--tw-ring-offset-width)) var(--tw-ring-color);
  box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
  --tw-ring-opacity: 1px;
  --tw-ring-color: rgb(164 202 254 / var(--tw-ring-opacity));
}

input[type="range"]::-moz-range-thumb {
  height: 1.25rem;
  width: 1.25rem;
  background: #1C64F2;
  border-radius: 9999px;
  border: 0;
  appearance: none;
  -moz-appearance: none;
  -webkit-appearance: none;
  cursor: pointer;
}

input[type="range"]:disabled::-moz-range-thumb {
  background: #9CA3AF;
}

.dark input[type="range"]:disabled::-moz-range-thumb {
  background: #6B7280;
}

input[type="range"]::-moz-range-progress {
  background: #3F83F8;
}

input[type="range"]::-ms-fill-lower {
  background: #3F83F8;
}

input[type="range"].range-sm::-webkit-slider-thumb {
  height: 1rem;
  width: 1rem;
}

input[type="range"].range-lg::-webkit-slider-thumb {
  height: 1.5rem;
  width: 1.5rem;
}

input[type="range"].range-sm::-moz-range-thumb {
  height: 1rem;
  width: 1rem;
}

input[type="range"].range-lg::-moz-range-thumb {
  height: 1.5rem;
  width: 1.5rem;
}

.toggle-bg:after {
  content: "";
  position: absolute;
  top: 0.125rem;
  left: 0.125rem;
  background: white;
  border-color: #D1D5DB;
  border-width: 1px;
  border-radius: 9999px;
  height: 1.25rem;
  width: 1.25rem;
  transition-property: background-color,border-color,color,fill,stroke,opacity,box-shadow,transform,filter,backdrop-filter,-webkit-backdrop-filter;
  transition-duration: .15s;
  box-shadow: var(--tw-ring-inset) 0 0 0 calc(0px + var(--tw-ring-offset-width)) var(--tw-ring-color);
}

input:checked + .toggle-bg:after {
  transform: translateX(100%);;
  border-color: white;
}

input:checked + .toggle-bg {
  background: #1C64F2;
  border-color: #1C64F2;
}

.tooltip-arrow,.tooltip-arrow:before {
  position: absolute;
  width: 8px;
  height: 8px;
  background: inherit;
}

.tooltip-arrow {
  visibility: hidden;
}

.tooltip-arrow:before {
  content: "";
  visibility: visible;
  transform: rotate(45deg);
}

[data-tooltip-style^='light'] + .tooltip > .tooltip-arrow:before {
  border-style: solid;
  border-color: #e5e7eb;
}

[data-tooltip-style^='light'] + .tooltip[data-popper-placement^='top'] > .tooltip-arrow:before {
  border-bottom-width: 1px;
  border-right-width: 1px;
}

[data-tooltip-style^='light'] + .tooltip[data-popper-placement^='right'] > .tooltip-arrow:before {
  border-bottom-width: 1px;
  border-left-width: 1px;
}

[data-tooltip-style^='light'] + .tooltip[data-popper-placement^='bottom'] > .tooltip-arrow:before {
  border-top-width: 1px;
  border-left-width: 1px;
}

[data-tooltip-style^='light'] + .tooltip[data-popper-placement^='left'] > .tooltip-arrow:before {
  border-top-width: 1px;
  border-right-width: 1px;
}

.tooltip[data-popper-placement^='top'] > .tooltip-arrow {
  bottom: -4px;
}

.tooltip[data-popper-placement^='bottom'] > .tooltip-arrow {
  top: -4px;
}

.tooltip[data-popper-placement^='left'] > .tooltip-arrow {
  right: -4px;
}

.tooltip[data-popper-placement^='right'] > .tooltip-arrow {
  left: -4px;
}

.tooltip.invisible > .tooltip-arrow:before {
  visibility: hidden;
}

[data-popper-arrow],[data-popper-arrow]:before {
  position: absolute;
  width: 8px;
  height: 8px;
  background: inherit;
}

[data-popper-arrow] {
  visibility: hidden;
}

[data-popper-arrow]:before {
  content: "";
  visibility: visible;
  transform: rotate(45deg);
}

[data-popper-arrow]:after {
  content: "";
  visibility: visible;
  transform: rotate(45deg);
  position: absolute;
  width: 9px;
  height: 9px;
  background: inherit;
}

[role="tooltip"] > [data-popper-arrow]:before {
  border-style: solid;
  border-color: #e5e7eb;
}

.dark [role="tooltip"] > [data-popper-arrow]:before {
  border-style: solid;
  border-color: #4b5563;
}

[role="tooltip"] > [data-popper-arrow]:after {
  border-style: solid;
  border-color: #e5e7eb;
}

.dark [role="tooltip"] > [data-popper-arrow]:after {
  border-style: solid;
  border-color: #4b5563;
}

[data-popover][role="tooltip"][data-popper-placement^='top'] > [data-popper-arrow]:before {
  border-bottom-width: 1px;
  border-right-width: 1px;
}

[data-popover][role="tooltip"][data-popper-placement^='top'] > [data-popper-arrow]:after {
  border-bottom-width: 1px;
  border-right-width: 1px;
}

[data-popover][role="tooltip"][data-popper-placement^='right'] > [data-popper-arrow]:before {
  border-bottom-width: 1px;
  border-left-width: 1px;
}

[data-popover][role="tooltip"][data-popper-placement^='right'] > [data-popper-arrow]:after {
  border-bottom-width: 1px;
  border-left-width: 1px;
}

[data-popover][role="tooltip"][data-popper-placement^='bottom'] > [data-popper-arrow]:before {
  border-top-width: 1px;
  border-left-width: 1px;
}

[data-popover][role="tooltip"][data-popper-placement^='bottom'] > [data-popper-arrow]:after {
  border-top-width: 1px;
  border-left-width: 1px;
}

[data-popover][role="tooltip"][data-popper-placement^='left'] > [data-popper-arrow]:before {
  border-top-width: 1px;
  border-right-width: 1px;
}

[data-popover][role="tooltip"][data-popper-placement^='left'] > [data-popper-arrow]:after {
  border-top-width: 1px;
  border-right-width: 1px;
}

[data-popover][role="tooltip"][data-popper-placement^='top'] > [data-popper-arrow] {
  bottom: -5px;
}

[data-popover][role="tooltip"][data-popper-placement^='bottom'] > [data-popper-arrow] {
  top: -5px;
}

[data-popover][role="tooltip"][data-popper-placement^='left'] > [data-popper-arrow] {
  right: -5px;
}

[data-popover][role="tooltip"][data-popper-placement^='right'] > [data-popper-arrow] {
  left: -5px;
}

[role="tooltip"].invisible > [data-popper-arrow]:before {
  visibility: hidden;
}

[role="tooltip"].invisible > [data-popper-arrow]:after {
  visibility: hidden;
}

*, ::before, ::after {
  --tw-border-spacing-x: 0;
  --tw-border-spacing-y: 0;
  --tw-translate-x: 0;
  --tw-translate-y: 0;
  --tw-rotate: 0;
  --tw-skew-x: 0;
  --tw-skew-y: 0;
  --tw-scale-x: 1;
  --tw-scale-y: 1;
  --tw-pan-x:  ;
  --tw-pan-y:  ;
  --tw-pinch-zoom:  ;
  --tw-scroll-snap-strictness: proximity;
  --tw-ordinal:  ;
  --tw-slashed-zero:  ;
  --tw-numeric-figure:  ;
  --tw-numeric-spacing:  ;
  --tw-numeric-fraction:  ;
  --tw-ring-inset:  ;
  --tw-ring-offset-width: 0px;
  --tw-ring-offset-color: #fff;
  --tw-ring-color: rgb(63 131 248 / 0.5);
  --tw-ring-offset-shadow: 0 0 #0000;
  --tw-ring-shadow: 0 0 #0000;
  --tw-shadow: 0 0 #0000;
  --tw-shadow-colored: 0 0 #0000;
  --tw-blur:  ;
  --tw-brightness:  ;
  --tw-contrast:  ;
  --tw-grayscale:  ;
  --tw-hue-rotate:  ;
  --tw-invert:  ;
  --tw-saturate:  ;
  --tw-sepia:  ;
  --tw-drop-shadow:  ;
  --tw-backdrop-blur:  ;
  --tw-backdrop-brightness:  ;
  --tw-backdrop-contrast:  ;
  --tw-backdrop-grayscale:  ;
  --tw-backdrop-hue-rotate:  ;
  --tw-backdrop-invert:  ;
  --tw-backdrop-opacity:  ;
  --tw-backdrop-saturate:  ;
  --tw-backdrop-sepia:  ;
}

::backdrop {
  --tw-border-spacing-x: 0;
  --tw-border-spacing-y: 0;
  --tw-translate-x: 0;
  --tw-translate-y: 0;
  --tw-rotate: 0;
  --tw-skew-x: 0;
  --tw-skew-y: 0;
  --tw-scale-x: 1;
  --tw-scale-y: 1;
  --tw-pan-x:  ;
  --tw-pan-y:  ;
  --tw-pinch-zoom:  ;
  --tw-scroll-snap-strictness: proximity;
  --tw-ordinal:  ;
  --tw-slashed-zero:  ;
  --tw-numeric-figure:  ;
  --tw-numeric-spacing:  ;
  --tw-numeric-fraction:  ;
  --tw-ring-inset:  ;
  --tw-ring-offset-width: 0px;
  --tw-ring-offset-color: #fff;
  --tw-ring-color: rgb(63 131 248 / 0.5);
  --tw-ring-offset-shadow: 0 0 #0000;
  --tw-ring-shadow: 0 0 #0000;
  --tw-shadow: 0 0 #0000;
  --tw-shadow-colored: 0 0 #0000;
  --tw-blur:  ;
  --tw-brightness:  ;
  --tw-contrast:  ;
  --tw-grayscale:  ;
  --tw-hue-rotate:  ;
  --tw-invert:  ;
  --tw-saturate:  ;
  --tw-sepia:  ;
  --tw-drop-shadow:  ;
  --tw-backdrop-blur:  ;
  --tw-backdrop-brightness:  ;
  --tw-backdrop-contrast:  ;
  --tw-backdrop-grayscale:  ;
  --tw-backdrop-hue-rotate:  ;
  --tw-backdrop-invert:  ;
  --tw-backdrop-opacity:  ;
  --tw-backdrop-saturate:  ;
  --tw-backdrop-sepia:  ;
}
.container {
  width: 100%;
}
@media (min-width: 640px) {

  .container {
    max-width: 640px;
  }
}
@media (min-width: 768px) {

  .container {
    max-width: 768px;
  }
}
@media (min-width: 1024px) {

  .container {
    max-width: 1024px;
  }
}
@media (min-width: 1280px) {

  .container {
    max-width: 1280px;
  }
}
@media (min-width: 1536px) {

  .container {
    max-width: 1536px;
  }
}
.sr-only {
  position: absolute;
  width: 1px;
  height: 1px;
  padding: 0;
  margin: -1px;
  overflow: hidden;
  clip: rect(0, 0, 0, 0);
  white-space: nowrap;
  border-width: 0;
}
.pointer-events-none {
  pointer-events: none;
}
.visible {
  visibility: visible;
}
.invisible {
  visibility: hidden;
}
.collapse {
  visibility: collapse;
}
.static {
  position: static;
}
.fixed {
  position: fixed;
}
.absolute {
  position: absolute;
}
.relative {
  position: relative;
}
.sticky {
  position: sticky;
}
.inset-0 {
  top: 0px;
  right: 0px;
  bottom: 0px;
  left: 0px;
}
.inset-y-0 {
  top: 0px;
  bottom: 0px;
}
.left-0 {
  left: 0px;
}
.top-28 {
  top: 7rem;
}
.right-5 {
  right: 1.25rem;
}
.bottom-5 {
  bottom: 1.25rem;
}
.left-5 {
  left: 1.25rem;
}
.top-0 {
  top: 0px;
}
.bottom-0 {
  bottom: 0px;
}
.-top-\[140px\] {
  top: -140px;
}
.-left-1 {
  left: -0.25rem;
}
.left-7 {
  left: 1.75rem;
}
.left-8 {
  left: 2rem;
}
.-top-2 {
  top: -0.5rem;
}
.-right-2 {
  right: -0.5rem;
}
.left-1\/2 {
  left: 50%;
}
.top-6 {
  top: 1.5rem;
}
.top-2\.5 {
  top: 0.625rem;
}
.right-2\.5 {
  right: 0.625rem;
}
.top-2 {
  top: 0.5rem;
}
.right-2 {
  right: 0.5rem;
}
.bottom-4 {
  bottom: 1rem;
}
.top-1\/2 {
  top: 50%;
}
.right-0 {
  right: 0px;
}
.bottom-2 {
  bottom: 0.5rem;
}
.bottom-\[\*px\] {
  bottom: *px;
}
.bottom-\[60px\] {
  bottom: 60px;
}
.top-3 {
  top: 0.75rem;
}
.right-3 {
  right: 0.75rem;
}
.right-1\/2 {
  right: 50%;
}
.right-auto {
  right: auto;
}
.left-auto {
  left: auto;
}
.top-2\/4 {
  top: 50%;
}
.right-6 {
  right: 1.5rem;
}
.bottom-6 {
  bottom: 1.5rem;
}
.right-24 {
  right: 6rem;
}
.-left-14 {
  left: -3.5rem;
}
.left-6 {
  left: 1.5rem;
}
.-left-4 {
  left: -1rem;
}
.-left-1\.5 {
  left: -0.375rem;
}
.-left-3 {
  left: -0.75rem;
}
.top-5 {
  top: 1.25rem;
}
.top-4 {
  top: 1rem;
}
.left-2\.5 {
  left: 0.625rem;
}
.left-2 {
  left: 0.5rem;
}
.left-1 {
  left: 0.25rem;
}
.top-1 {
  top: 0.25rem;
}
.bottom-2\.5 {
  bottom: 0.625rem;
}
.z-20 {
  z-index: 20;
}
.z-10 {
  z-index: 10;
}
.z-50 {
  z-index: 50;
}
.z-40 {
  z-index: 40;
}
.z-30 {
  z-index: 30;
}
.z-0 {
  z-index: 0;
}
.-z-10 {
  z-index: -10;
}
.col-span-2 {
  grid-column: span 2 / span 2;
}
.col-span-1 {
  grid-column: span 1 / span 1;
}
.col-span-3 {
  grid-column: span 3 / span 3;
}
.col-span-6 {
  grid-column: span 6 / span 6;
}
.m-5 {
  margin: 1.25rem;
}
.\!m-0 {
  margin: 0px !important;
}
.mx-auto {
  margin-left: auto;
  margin-right: auto;
}
.my-8 {
  margin-top: 2rem;
  margin-bottom: 2rem;
}
.mx-4 {
  margin-left: 1rem;
  margin-right: 1rem;
}
.my-3 {
  margin-top: 0.75rem;
  margin-bottom: 0.75rem;
}
.my-7 {
  margin-top: 1.75rem;
  margin-bottom: 1.75rem;
}
.my-6 {
  margin-top: 1.5rem;
  margin-bottom: 1.5rem;
}
.my-10 {
  margin-top: 2.5rem;
  margin-bottom: 2.5rem;
}
.-mx-1\.5 {
  margin-left: -0.375rem;
  margin-right: -0.375rem;
}
.-my-1\.5 {
  margin-top: -0.375rem;
  margin-bottom: -0.375rem;
}
.-mx-1 {
  margin-left: -0.25rem;
  margin-right: -0.25rem;
}
.-my-1 {
  margin-top: -0.25rem;
  margin-bottom: -0.25rem;
}
.mx-2 {
  margin-left: 0.5rem;
  margin-right: 0.5rem;
}
.mx-1 {
  margin-left: 0.25rem;
  margin-right: 0.25rem;
}
.my-2 {
  margin-top: 0.5rem;
  margin-bottom: 0.5rem;
}
.my-4 {
  margin-top: 1rem;
  margin-bottom: 1rem;
}
.mx-3 {
  margin-left: 0.75rem;
  margin-right: 0.75rem;
}
.mx-1\.5 {
  margin-left: 0.375rem;
  margin-right: 0.375rem;
}
.my-12 {
  margin-top: 3rem;
  margin-bottom: 3rem;
}
.mb-8 {
  margin-bottom: 2rem;
}
.mb-5 {
  margin-bottom: 1.25rem;
}
.mr-3 {
  margin-right: 0.75rem;
}
.ml-2 {
  margin-left: 0.5rem;
}
.mb-2 {
  margin-bottom: 0.5rem;
}
.mb-4 {
  margin-bottom: 1rem;
}
.mt-6 {
  margin-top: 1.5rem;
}
.mr-8 {
  margin-right: 2rem;
}
.mr-2 {
  margin-right: 0.5rem;
}
.ml-auto {
  margin-left: auto;
}
.mb-3 {
  margin-bottom: 0.75rem;
}
.mb-6 {
  margin-bottom: 1.5rem;
}
.ml-1 {
  margin-left: 0.25rem;
}
.ml-6 {
  margin-left: 1.5rem;
}
.mr-1 {
  margin-right: 0.25rem;
}
.ml-3 {
  margin-left: 0.75rem;
}
.mb-0 {
  margin-bottom: 0px;
}
.mt-8 {
  margin-top: 2rem;
}
.mb-2\.5 {
  margin-bottom: 0.625rem;
}
.mb-7 {
  margin-bottom: 1.75rem;
}
.mt-7 {
  margin-top: 1.75rem;
}
.mt-1\.5 {
  margin-top: 0.375rem;
}
.ml-4 {
  margin-left: 1rem;
}
.mt-1 {
  margin-top: 0.25rem;
}
.-mb-5 {
  margin-bottom: -1.25rem;
}
.mt-2 {
  margin-top: 0.5rem;
}
.-ml-0\.5 {
  margin-left: -0.125rem;
}
.-ml-0 {
  margin-left: -0px;
}
.ml-0 {
  margin-left: 0px;
}
.mr-4 {
  margin-right: 1rem;
}
.mr-auto {
  margin-right: auto;
}
.mb-1 {
  margin-bottom: 0.25rem;
}
.mr-1\.5 {
  margin-right: 0.375rem;
}
.ml-1\.5 {
  margin-left: 0.375rem;
}
.-ml-1 {
  margin-left: -0.25rem;
}
.-mr-1 {
  margin-right: -0.25rem;
}
.mt-4 {
  margin-top: 1rem;
}
.mt-2\.5 {
  margin-top: 0.625rem;
}
.-mt-1 {
  margin-top: -0.25rem;
}
.-mt-5 {
  margin-top: -1.25rem;
}
.mb-1\.5 {
  margin-bottom: 0.375rem;
}
.mt-3 {
  margin-top: 0.75rem;
}
.mr-6 {
  margin-right: 1.5rem;
}
.mt-0 {
  margin-top: 0px;
}
.mt-14 {
  margin-top: 3.5rem;
}
.mb-10 {
  margin-bottom: 2.5rem;
}
.-ml-px {
  margin-left: -1px;
}
.mt-px {
  margin-top: 1px;
}
.mb-px {
  margin-bottom: 1px;
}
.-mb-px {
  margin-bottom: -1px;
}
.mr-5 {
  margin-right: 1.25rem;
}
.mt-10 {
  margin-top: 2.5rem;
}
.block {
  display: block;
}
.inline-block {
  display: inline-block;
}
.inline {
  display: inline;
}
.flex {
  display: flex;
}
.inline-flex {
  display: inline-flex;
}
.table {
  display: table;
}
.flow-root {
  display: flow-root;
}
.grid {
  display: grid;
}
.contents {
  display: contents;
}
.hidden {
  display: none;
}
.h-6 {
  height: 1.5rem;
}
.h-9 {
  height: 2.25rem;
}
.h-full {
  height: 100%;
}
.h-4 {
  height: 1rem;
}
.h-5 {
  height: 1.25rem;
}
.h-\[calc\(100vh-5rem\)\] {
  height: calc(100vh - 5rem);
}
.h-8 {
  height: 2rem;
}
.h-2\.5 {
  height: 0.625rem;
}
.h-2 {
  height: 0.5rem;
}
.h-48 {
  height: 12rem;
}
.h-12 {
  height: 3rem;
}
.h-0 {
  height: 0px;
}
.h-7 {
  height: 1.75rem;
}
.h-3 {
  height: 0.75rem;
}
.h-10 {
  height: 2.5rem;
}
.h-3\.5 {
  height: 0.875rem;
}
.h-20 {
  height: 5rem;
}
.h-36 {
  height: 9rem;
}
.h-16 {
  height: 4rem;
}
.h-96 {
  height: 24rem;
}
.h-11 {
  height: 2.75rem;
}
.h-24 {
  height: 6rem;
}
.h-1\.5 {
  height: 0.375rem;
}
.h-1 {
  height: 0.25rem;
}
.h-56 {
  height: 14rem;
}
.h-screen {
  height: 100vh;
}
.h-0\.5 {
  height: 0.125rem;
}
.h-\[calc\(100\%-1rem\)\] {
  height: calc(100% - 1rem);
}
.h-14 {
  height: 3.5rem;
}
.h-28 {
  height: 7rem;
}
.h-72 {
  height: 18rem;
}
.h-64 {
  height: 16rem;
}
.h-80 {
  height: 20rem;
}
.h-\[52px\] {
  height: 52px;
}
.h-\[56px\] {
  height: 56px;
}
.h-auto {
  height: auto;
}
.h-px {
  height: 1px;
}
.max-h-72 {
  max-height: 18rem;
}
.w-64 {
  width: 16rem;
}
.w-1\/2 {
  width: 50%;
}
.w-full {
  width: 100%;
}
.w-72 {
  width: 18rem;
}
.w-4 {
  width: 1rem;
}
.w-6 {
  width: 1.5rem;
}
.w-5 {
  width: 1.25rem;
}
.w-48 {
  width: 12rem;
}
.w-12 {
  width: 3rem;
}
.w-8 {
  width: 2rem;
}
.w-7 {
  width: 1.75rem;
}
.w-10 {
  width: 2.5rem;
}
.w-3\.5 {
  width: 0.875rem;
}
.w-3 {
  width: 0.75rem;
}
.w-44 {
  width: 11rem;
}
.w-20 {
  width: 5rem;
}
.w-36 {
  width: 9rem;
}
.w-\[calc\(100\%-2rem\)\] {
  width: calc(100% - 2rem);
}
.w-11 {
  width: 2.75rem;
}
.w-24 {
  width: 6rem;
}
.w-9 {
  width: 2.25rem;
}
.w-80 {
  width: 20rem;
}
.w-60 {
  width: 15rem;
}
.w-2\.5 {
  width: 0.625rem;
}
.w-2 {
  width: 0.5rem;
}
.w-56 {
  width: 14rem;
}
.w-auto {
  width: auto;
}
.w-14 {
  width: 3.5rem;
}
.w-96 {
  width: 24rem;
}
.w-1 {
  width: 0.25rem;
}
.w-2\/4 {
  width: 50%;
}
.w-32 {
  width: 8rem;
}
.w-\[52px\] {
  width: 52px;
}
.w-\[56px\] {
  width: 56px;
}
.min-w-0 {
  min-width: 0px;
}
.min-w-max {
  min-width: -moz-max-content;
  min-width: max-content;
}
.max-w-8xl {
  max-width: 90rem;
}
.max-w-4xl {
  max-width: 56rem;
}
.max-w-md {
  max-width: 28rem;
}
.max-w-lg {
  max-width: 32rem;
}
.max-w-2xs {
  max-width: 16rem;
}
.max-w-\[460px\] {
  max-width: 460px;
}
.max-w-\[500px\] {
  max-width: 500px;
}
.max-w-\[450px\] {
  max-width: 450px;
}
.max-w-\[380px\] {
  max-width: 380px;
}
.max-w-\[128px\] {
  max-width: 128px;
}
.max-w-xs {
  max-width: 20rem;
}
.max-w-sm {
  max-width: 24rem;
}
.max-w-screen-xl {
  max-width: 1280px;
}
.max-w-2xl {
  max-width: 42rem;
}
.max-w-\[48px\] {
  max-width: 48px;
}
.max-w-xl {
  max-width: 36rem;
}
.max-w-7xl {
  max-width: 80rem;
}
.max-w-\[360px\] {
  max-width: 360px;
}
.max-w-\[330px\] {
  max-width: 330px;
}
.max-w-\[300px\] {
  max-width: 300px;
}
.max-w-\[480px\] {
  max-width: 480px;
}
.max-w-\[440px\] {
  max-width: 440px;
}
.max-w-\[400px\] {
  max-width: 400px;
}
.max-w-\[640px\] {
  max-width: 640px;
}
.max-w-\[540px\] {
  max-width: 540px;
}
.max-w-none {
  max-width: none;
}
.max-w-full {
  max-width: 100%;
}
.max-w-screen-md {
  max-width: 768px;
}
.flex-none {
  flex: none;
}
.flex-auto {
  flex: 1 1 auto;
}
.flex-1 {
  flex: 1 1 0%;
}
.flex-shrink-0 {
  flex-shrink: 0;
}
.shrink-0 {
  flex-shrink: 0;
}
.grow {
  flex-grow: 1;
}
.origin-\[0\] {
  transform-origin: 0;
}
.-translate-y-1\/2 {
  --tw-translate-y: -50%;
  transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
}
.translate-y-1\/4 {
  --tw-translate-y: 25%;
  transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
}
.-translate-x-1\/2 {
  --tw-translate-x: -50%;
  transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
}
.-translate-x-full {
  --tw-translate-x: -100%;
  transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
}
.translate-x-full {
  --tw-translate-x: 100%;
  transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
}
.-translate-y-full {
  --tw-translate-y: -100%;
  transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
}
.translate-y-full {
  --tw-translate-y: 100%;
  transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
}
.-translate-y-6 {
  --tw-translate-y: -1.5rem;
  transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
}
.translate-x-1\/2 {
  --tw-translate-x: 50%;
  transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
}
.translate-y-1\/2 {
  --tw-translate-y: 50%;
  transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
}
.-translate-y-4 {
  --tw-translate-y: -1rem;
  transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
}
.-translate-y-3 {
  --tw-translate-y: -0.75rem;
  transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
}
.translate-x-0 {
  --tw-translate-x: 0px;
  transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
}
.rotate-180 {
  --tw-rotate: 180deg;
  transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
}
.rotate-90 {
  --tw-rotate: 90deg;
  transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
}
.scale-75 {
  --tw-scale-x: .75;
  --tw-scale-y: .75;
  transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
}
.transform {
  transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
}
.transform-none {
  transform: none;
}
@keyframes pulse {

  50% {
    opacity: .5;
  }
}
.animate-pulse {
  animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}
@keyframes spin {

  to {
    transform: rotate(360deg);
  }
}
.animate-spin {
  animation: spin 1s linear infinite;
}
.cursor-pointer {
  cursor: pointer;
}
.cursor-not-allowed {
  cursor: not-allowed;
}
.list-inside {
  list-style-position: inside;
}
.list-disc {
  list-style-type: disc;
}
.list-none {
  list-style-type: none;
}
.list-decimal {
  list-style-type: decimal;
}
.appearance-none {
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
}
.grid-cols-4 {
  grid-template-columns: repeat(4, minmax(0, 1fr));
}
.grid-cols-7 {
  grid-template-columns: repeat(7, minmax(0, 1fr));
}
.grid-cols-3 {
  grid-template-columns: repeat(3, minmax(0, 1fr));
}
.grid-cols-2 {
  grid-template-columns: repeat(2, minmax(0, 1fr));
}
.grid-cols-5 {
  grid-template-columns: repeat(5, minmax(0, 1fr));
}
.grid-cols-6 {
  grid-template-columns: repeat(6, minmax(0, 1fr));
}
.grid-cols-1 {
  grid-template-columns: repeat(1, minmax(0, 1fr));
}
.flex-row {
  flex-direction: row;
}
.flex-col {
  flex-direction: column;
}
.flex-wrap {
  flex-wrap: wrap;
}
.items-start {
  align-items: flex-start;
}
.items-end {
  align-items: flex-end;
}
.items-center {
  align-items: center;
}
.items-baseline {
  align-items: baseline;
}
.justify-start {
  justify-content: flex-start;
}
.justify-end {
  justify-content: flex-end;
}
.justify-center {
  justify-content: center;
}
.justify-between {
  justify-content: space-between;
}
.gap-12 {
  gap: 3rem;
}
.gap-1 {
  gap: 0.25rem;
}
.gap-8 {
  gap: 2rem;
}
.gap-4 {
  gap: 1rem;
}
.gap-2 {
  gap: 0.5rem;
}
.gap-6 {
  gap: 1.5rem;
}
.gap-16 {
  gap: 4rem;
}
.gap-x-16 {
  -moz-column-gap: 4rem;
       column-gap: 4rem;
}
.gap-y-3 {
  row-gap: 0.75rem;
}
.gap-x-4 {
  -moz-column-gap: 1rem;
       column-gap: 1rem;
}
.space-x-2 > :not([hidden]) ~ :not([hidden]) {
  --tw-space-x-reverse: 0;
  margin-right: calc(0.5rem * var(--tw-space-x-reverse));
  margin-left: calc(0.5rem * calc(1 - var(--tw-space-x-reverse)));
}
.space-x-4 > :not([hidden]) ~ :not([hidden]) {
  --tw-space-x-reverse: 0;
  margin-right: calc(1rem * var(--tw-space-x-reverse));
  margin-left: calc(1rem * calc(1 - var(--tw-space-x-reverse)));
}
.-space-x-4 > :not([hidden]) ~ :not([hidden]) {
  --tw-space-x-reverse: 0;
  margin-right: calc(-1rem * var(--tw-space-x-reverse));
  margin-left: calc(-1rem * calc(1 - var(--tw-space-x-reverse)));
}
.space-x-6 > :not([hidden]) ~ :not([hidden]) {
  --tw-space-x-reverse: 0;
  margin-right: calc(1.5rem * var(--tw-space-x-reverse));
  margin-left: calc(1.5rem * calc(1 - var(--tw-space-x-reverse)));
}
.space-x-1 > :not([hidden]) ~ :not([hidden]) {
  --tw-space-x-reverse: 0;
  margin-right: calc(0.25rem * var(--tw-space-x-reverse));
  margin-left: calc(0.25rem * calc(1 - var(--tw-space-x-reverse)));
}
.space-x-3 > :not([hidden]) ~ :not([hidden]) {
  --tw-space-x-reverse: 0;
  margin-right: calc(0.75rem * var(--tw-space-x-reverse));
  margin-left: calc(0.75rem * calc(1 - var(--tw-space-x-reverse)));
}
.space-y-6 > :not([hidden]) ~ :not([hidden]) {
  --tw-space-y-reverse: 0;
  margin-top: calc(1.5rem * calc(1 - var(--tw-space-y-reverse)));
  margin-bottom: calc(1.5rem * var(--tw-space-y-reverse));
}
.space-y-4 > :not([hidden]) ~ :not([hidden]) {
  --tw-space-y-reverse: 0;
  margin-top: calc(1rem * calc(1 - var(--tw-space-y-reverse)));
  margin-bottom: calc(1rem * var(--tw-space-y-reverse));
}
.space-y-5 > :not([hidden]) ~ :not([hidden]) {
  --tw-space-y-reverse: 0;
  margin-top: calc(1.25rem * calc(1 - var(--tw-space-y-reverse)));
  margin-bottom: calc(1.25rem * var(--tw-space-y-reverse));
}
.space-y-0\.5 > :not([hidden]) ~ :not([hidden]) {
  --tw-space-y-reverse: 0;
  margin-top: calc(0.125rem * calc(1 - var(--tw-space-y-reverse)));
  margin-bottom: calc(0.125rem * var(--tw-space-y-reverse));
}
.space-y-0 > :not([hidden]) ~ :not([hidden]) {
  --tw-space-y-reverse: 0;
  margin-top: calc(0px * calc(1 - var(--tw-space-y-reverse)));
  margin-bottom: calc(0px * var(--tw-space-y-reverse));
}
.space-y-3 > :not([hidden]) ~ :not([hidden]) {
  --tw-space-y-reverse: 0;
  margin-top: calc(0.75rem * calc(1 - var(--tw-space-y-reverse)));
  margin-bottom: calc(0.75rem * var(--tw-space-y-reverse));
}
.space-y-2 > :not([hidden]) ~ :not([hidden]) {
  --tw-space-y-reverse: 0;
  margin-top: calc(0.5rem * calc(1 - var(--tw-space-y-reverse)));
  margin-bottom: calc(0.5rem * var(--tw-space-y-reverse));
}
.space-y-1 > :not([hidden]) ~ :not([hidden]) {
  --tw-space-y-reverse: 0;
  margin-top: calc(0.25rem * calc(1 - var(--tw-space-y-reverse)));
  margin-bottom: calc(0.25rem * var(--tw-space-y-reverse));
}
.space-y-8 > :not([hidden]) ~ :not([hidden]) {
  --tw-space-y-reverse: 0;
  margin-top: calc(2rem * calc(1 - var(--tw-space-y-reverse)));
  margin-bottom: calc(2rem * var(--tw-space-y-reverse));
}
.space-x-8 > :not([hidden]) ~ :not([hidden]) {
  --tw-space-x-reverse: 0;
  margin-right: calc(2rem * var(--tw-space-x-reverse));
  margin-left: calc(2rem * calc(1 - var(--tw-space-x-reverse)));
}
.-space-x-px > :not([hidden]) ~ :not([hidden]) {
  --tw-space-x-reverse: 0;
  margin-right: calc(-1px * var(--tw-space-x-reverse));
  margin-left: calc(-1px * calc(1 - var(--tw-space-x-reverse)));
}
.-space-x-3 > :not([hidden]) ~ :not([hidden]) {
  --tw-space-x-reverse: 0;
  margin-right: calc(-0.75rem * var(--tw-space-x-reverse));
  margin-left: calc(-0.75rem * calc(1 - var(--tw-space-x-reverse)));
}
.space-x-5 > :not([hidden]) ~ :not([hidden]) {
  --tw-space-x-reverse: 0;
  margin-right: calc(1.25rem * var(--tw-space-x-reverse));
  margin-left: calc(1.25rem * calc(1 - var(--tw-space-x-reverse)));
}
.space-y-2\.5 > :not([hidden]) ~ :not([hidden]) {
  --tw-space-y-reverse: 0;
  margin-top: calc(0.625rem * calc(1 - var(--tw-space-y-reverse)));
  margin-bottom: calc(0.625rem * var(--tw-space-y-reverse));
}
.space-x-2\.5 > :not([hidden]) ~ :not([hidden]) {
  --tw-space-x-reverse: 0;
  margin-right: calc(0.625rem * var(--tw-space-x-reverse));
  margin-left: calc(0.625rem * calc(1 - var(--tw-space-x-reverse)));
}
.space-y-1\.5 > :not([hidden]) ~ :not([hidden]) {
  --tw-space-y-reverse: 0;
  margin-top: calc(0.375rem * calc(1 - var(--tw-space-y-reverse)));
  margin-bottom: calc(0.375rem * var(--tw-space-y-reverse));
}
.divide-y > :not([hidden]) ~ :not([hidden]) {
  --tw-divide-y-reverse: 0;
  border-top-width: calc(1px * calc(1 - var(--tw-divide-y-reverse)));
  border-bottom-width: calc(1px * var(--tw-divide-y-reverse));
}
.divide-x > :not([hidden]) ~ :not([hidden]) {
  --tw-divide-x-reverse: 0;
  border-right-width: calc(1px * var(--tw-divide-x-reverse));
  border-left-width: calc(1px * calc(1 - var(--tw-divide-x-reverse)));
}
.divide-x-2 > :not([hidden]) ~ :not([hidden]) {
  --tw-divide-x-reverse: 0;
  border-right-width: calc(2px * var(--tw-divide-x-reverse));
  border-left-width: calc(2px * calc(1 - var(--tw-divide-x-reverse)));
}
.divide-gray-100 > :not([hidden]) ~ :not([hidden]) {
  --tw-divide-opacity: 1;
  border-color: rgb(243 244 246 / var(--tw-divide-opacity));
}
.divide-gray-200 > :not([hidden]) ~ :not([hidden]) {
  --tw-divide-opacity: 1;
  border-color: rgb(229 231 235 / var(--tw-divide-opacity));
}
.divide-gray-500 > :not([hidden]) ~ :not([hidden]) {
  --tw-divide-opacity: 1;
  border-color: rgb(107 114 128 / var(--tw-divide-opacity));
}
.divide-gray-300 > :not([hidden]) ~ :not([hidden]) {
  --tw-divide-opacity: 1;
  border-color: rgb(209 213 219 / var(--tw-divide-opacity));
}
.place-self-center {
  place-self: center;
}
.self-center {
  align-self: center;
}
.overflow-hidden {
  overflow: hidden;
}
.overflow-x-auto {
  overflow-x: auto;
}
.overflow-y-auto {
  overflow-y: auto;
}
.overflow-x-hidden {
  overflow-x: hidden;
}
.overflow-y-scroll {
  overflow-y: scroll;
}
.truncate {
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}
.whitespace-normal {
  white-space: normal;
}
.whitespace-nowrap {
  white-space: nowrap;
}
.whitespace-pre-line {
  white-space: pre-line;
}
.rounded-full {
  border-radius: 9999px;
}
.rounded-lg {
  border-radius: 0.5rem;
}
.rounded {
  border-radius: 0.25rem;
}
.rounded-sm {
  border-radius: 0.125rem;
}
.rounded-md {
  border-radius: 0.375rem;
}
.rounded-none {
  border-radius: 0px;
}
.rounded-l-lg {
  border-top-left-radius: 0.5rem;
  border-bottom-left-radius: 0.5rem;
}
.rounded-r-lg {
  border-top-right-radius: 0.5rem;
  border-bottom-right-radius: 0.5rem;
}
.rounded-t-xl {
  border-top-left-radius: 0.75rem;
  border-top-right-radius: 0.75rem;
}
.rounded-t-md {
  border-top-left-radius: 0.375rem;
  border-top-right-radius: 0.375rem;
}
.rounded-l-full {
  border-top-left-radius: 9999px;
  border-bottom-left-radius: 9999px;
}
.rounded-r-full {
  border-top-right-radius: 9999px;
  border-bottom-right-radius: 9999px;
}
.rounded-r-md {
  border-top-right-radius: 0.375rem;
  border-bottom-right-radius: 0.375rem;
}
.rounded-t-lg {
  border-top-left-radius: 0.5rem;
  border-top-right-radius: 0.5rem;
}
.rounded-b-lg {
  border-bottom-right-radius: 0.5rem;
  border-bottom-left-radius: 0.5rem;
}
.rounded-l-md {
  border-top-left-radius: 0.375rem;
  border-bottom-left-radius: 0.375rem;
}
.rounded-t {
  border-top-left-radius: 0.25rem;
  border-top-right-radius: 0.25rem;
}
.rounded-b {
  border-bottom-right-radius: 0.25rem;
  border-bottom-left-radius: 0.25rem;
}
.rounded-l {
  border-top-left-radius: 0.25rem;
  border-bottom-left-radius: 0.25rem;
}
.rounded-r {
  border-top-right-radius: 0.25rem;
  border-bottom-right-radius: 0.25rem;
}
.rounded-tl-lg {
  border-top-left-radius: 0.5rem;
}
.rounded-tr-lg {
  border-top-right-radius: 0.5rem;
}
.rounded-bl-lg {
  border-bottom-left-radius: 0.5rem;
}
.border {
  border-width: 1px;
}
.border-2 {
  border-width: 2px;
}
.border-0 {
  border-width: 0px;
}
.border-x {
  border-left-width: 1px;
  border-right-width: 1px;
}
.border-y {
  border-top-width: 1px;
  border-bottom-width: 1px;
}
.border-b {
  border-bottom-width: 1px;
}
.border-r {
  border-right-width: 1px;
}
.border-l {
  border-left-width: 1px;
}
.border-t {
  border-top-width: 1px;
}
.border-b-0 {
  border-bottom-width: 0px;
}
.border-t-0 {
  border-top-width: 0px;
}
.border-t-4 {
  border-top-width: 4px;
}
.border-b-2 {
  border-bottom-width: 2px;
}
.border-r-0 {
  border-right-width: 0px;
}
.border-l-2 {
  border-left-width: 2px;
}
.border-l-4 {
  border-left-width: 4px;
}
.border-dashed {
  border-style: dashed;
}
.border-gray-200 {
  --tw-border-opacity: 1;
  border-color: rgb(229 231 235 / var(--tw-border-opacity));
}
.border-gray-300 {
  --tw-border-opacity: 1;
  border-color: rgb(209 213 219 / var(--tw-border-opacity));
}
.border-blue-100 {
  --tw-border-opacity: 1;
  border-color: rgb(225 239 254 / var(--tw-border-opacity));
}
.border-blue-300 {
  --tw-border-opacity: 1;
  border-color: rgb(164 202 254 / var(--tw-border-opacity));
}
.border-red-300 {
  --tw-border-opacity: 1;
  border-color: rgb(248 180 180 / var(--tw-border-opacity));
}
.border-green-300 {
  --tw-border-opacity: 1;
  border-color: rgb(132 225 188 / var(--tw-border-opacity));
}
.border-yellow-300 {
  --tw-border-opacity: 1;
  border-color: rgb(250 202 21 / var(--tw-border-opacity));
}
.border-blue-800 {
  --tw-border-opacity: 1;
  border-color: rgb(30 66 159 / var(--tw-border-opacity));
}
.border-red-800 {
  --tw-border-opacity: 1;
  border-color: rgb(155 28 28 / var(--tw-border-opacity));
}
.border-green-800 {
  --tw-border-opacity: 1;
  border-color: rgb(3 84 63 / var(--tw-border-opacity));
}
.border-yellow-800 {
  --tw-border-opacity: 1;
  border-color: rgb(114 59 19 / var(--tw-border-opacity));
}
.border-gray-700 {
  --tw-border-opacity: 1;
  border-color: rgb(55 65 81 / var(--tw-border-opacity));
}
.border-white {
  --tw-border-opacity: 1;
  border-color: rgb(255 255 255 / var(--tw-border-opacity));
}
.border-blue-400 {
  --tw-border-opacity: 1;
  border-color: rgb(118 169 250 / var(--tw-border-opacity));
}
.border-gray-500 {
  --tw-border-opacity: 1;
  border-color: rgb(107 114 128 / var(--tw-border-opacity));
}
.border-red-400 {
  --tw-border-opacity: 1;
  border-color: rgb(249 128 128 / var(--tw-border-opacity));
}
.border-green-400 {
  --tw-border-opacity: 1;
  border-color: rgb(49 196 141 / var(--tw-border-opacity));
}
.border-indigo-400 {
  --tw-border-opacity: 1;
  border-color: rgb(141 162 251 / var(--tw-border-opacity));
}
.border-purple-400 {
  --tw-border-opacity: 1;
  border-color: rgb(172 148 250 / var(--tw-border-opacity));
}
.border-pink-400 {
  --tw-border-opacity: 1;
  border-color: rgb(241 126 184 / var(--tw-border-opacity));
}
.border-gray-100 {
  --tw-border-opacity: 1;
  border-color: rgb(243 244 246 / var(--tw-border-opacity));
}
.border-gray-900 {
  --tw-border-opacity: 1;
  border-color: rgb(17 24 39 / var(--tw-border-opacity));
}
.border-blue-700 {
  --tw-border-opacity: 1;
  border-color: rgb(26 86 219 / var(--tw-border-opacity));
}
.border-gray-800 {
  --tw-border-opacity: 1;
  border-color: rgb(31 41 55 / var(--tw-border-opacity));
}
.border-green-700 {
  --tw-border-opacity: 1;
  border-color: rgb(4 108 78 / var(--tw-border-opacity));
}
.border-red-700 {
  --tw-border-opacity: 1;
  border-color: rgb(200 30 30 / var(--tw-border-opacity));
}
.border-yellow-400 {
  --tw-border-opacity: 1;
  border-color: rgb(227 160 8 / var(--tw-border-opacity));
}
.border-purple-700 {
  --tw-border-opacity: 1;
  border-color: rgb(108 43 217 / var(--tw-border-opacity));
}
.border-green-500 {
  --tw-border-opacity: 1;
  border-color: rgb(14 159 110 / var(--tw-border-opacity));
}
.border-red-500 {
  --tw-border-opacity: 1;
  border-color: rgb(240 82 82 / var(--tw-border-opacity));
}
.border-blue-600 {
  --tw-border-opacity: 1;
  border-color: rgb(28 100 242 / var(--tw-border-opacity));
}
.border-transparent {
  border-color: transparent;
}
.border-green-600 {
  --tw-border-opacity: 1;
  border-color: rgb(5 122 85 / var(--tw-border-opacity));
}
.border-red-600 {
  --tw-border-opacity: 1;
  border-color: rgb(224 36 36 / var(--tw-border-opacity));
}
.\!border-blue-700 {
  --tw-border-opacity: 1 !important;
  border-color: rgb(26 86 219 / var(--tw-border-opacity)) !important;
}
.border-l-gray-100 {
  --tw-border-opacity: 1;
  border-left-color: rgb(243 244 246 / var(--tw-border-opacity));
}
.border-l-gray-50 {
  --tw-border-opacity: 1;
  border-left-color: rgb(249 250 251 / var(--tw-border-opacity));
}
.bg-gray-200 {
  --tw-bg-opacity: 1;
  background-color: rgb(229 231 235 / var(--tw-bg-opacity));
}
.bg-gray-900\/50 {
  background-color: rgb(17 24 39 / 0.5);
}
.bg-gray-100 {
  --tw-bg-opacity: 1;
  background-color: rgb(243 244 246 / var(--tw-bg-opacity));
}
.bg-blue-600 {
  --tw-bg-opacity: 1;
  background-color: rgb(28 100 242 / var(--tw-bg-opacity));
}
.bg-white {
  --tw-bg-opacity: 1;
  background-color: rgb(255 255 255 / var(--tw-bg-opacity));
}
.bg-green-500 {
  --tw-bg-opacity: 1;
  background-color: rgb(14 159 110 / var(--tw-bg-opacity));
}
.bg-gray-50 {
  --tw-bg-opacity: 1;
  background-color: rgb(249 250 251 / var(--tw-bg-opacity));
}
.bg-blue-700 {
  --tw-bg-opacity: 1;
  background-color: rgb(26 86 219 / var(--tw-bg-opacity));
}
.bg-blue-100 {
  --tw-bg-opacity: 1;
  background-color: rgb(225 239 254 / var(--tw-bg-opacity));
}
.bg-gray-900 {
  --tw-bg-opacity: 1;
  background-color: rgb(17 24 39 / var(--tw-bg-opacity));
}
.bg-gray-300 {
  --tw-bg-opacity: 1;
  background-color: rgb(209 213 219 / var(--tw-bg-opacity));
}
.bg-blue-50 {
  --tw-bg-opacity: 1;
  background-color: rgb(235 245 255 / var(--tw-bg-opacity));
}
.bg-red-50 {
  --tw-bg-opacity: 1;
  background-color: rgb(253 242 242 / var(--tw-bg-opacity));
}
.bg-green-50 {
  --tw-bg-opacity: 1;
  background-color: rgb(243 250 247 / var(--tw-bg-opacity));
}
.bg-yellow-50 {
  --tw-bg-opacity: 1;
  background-color: rgb(253 253 234 / var(--tw-bg-opacity));
}
.bg-blue-800 {
  --tw-bg-opacity: 1;
  background-color: rgb(30 66 159 / var(--tw-bg-opacity));
}
.bg-transparent {
  background-color: transparent;
}
.bg-red-800 {
  --tw-bg-opacity: 1;
  background-color: rgb(155 28 28 / var(--tw-bg-opacity));
}
.bg-green-800 {
  --tw-bg-opacity: 1;
  background-color: rgb(3 84 63 / var(--tw-bg-opacity));
}
.bg-yellow-800 {
  --tw-bg-opacity: 1;
  background-color: rgb(114 59 19 / var(--tw-bg-opacity));
}
.bg-gray-700 {
  --tw-bg-opacity: 1;
  background-color: rgb(55 65 81 / var(--tw-bg-opacity));
}
.bg-green-400 {
  --tw-bg-opacity: 1;
  background-color: rgb(49 196 141 / var(--tw-bg-opacity));
}
.bg-red-400 {
  --tw-bg-opacity: 1;
  background-color: rgb(249 128 128 / var(--tw-bg-opacity));
}
.bg-red-100 {
  --tw-bg-opacity: 1;
  background-color: rgb(253 232 232 / var(--tw-bg-opacity));
}
.bg-green-100 {
  --tw-bg-opacity: 1;
  background-color: rgb(222 247 236 / var(--tw-bg-opacity));
}
.bg-yellow-100 {
  --tw-bg-opacity: 1;
  background-color: rgb(253 246 178 / var(--tw-bg-opacity));
}
.bg-indigo-100 {
  --tw-bg-opacity: 1;
  background-color: rgb(229 237 255 / var(--tw-bg-opacity));
}
.bg-purple-100 {
  --tw-bg-opacity: 1;
  background-color: rgb(237 235 254 / var(--tw-bg-opacity));
}
.bg-pink-100 {
  --tw-bg-opacity: 1;
  background-color: rgb(252 232 243 / var(--tw-bg-opacity));
}
.bg-red-500 {
  --tw-bg-opacity: 1;
  background-color: rgb(240 82 82 / var(--tw-bg-opacity));
}
.bg-blue-200 {
  --tw-bg-opacity: 1;
  background-color: rgb(195 221 253 / var(--tw-bg-opacity));
}
.bg-gray-800 {
  --tw-bg-opacity: 1;
  background-color: rgb(31 41 55 / var(--tw-bg-opacity));
}
.bg-green-700 {
  --tw-bg-opacity: 1;
  background-color: rgb(4 108 78 / var(--tw-bg-opacity));
}
.bg-red-700 {
  --tw-bg-opacity: 1;
  background-color: rgb(200 30 30 / var(--tw-bg-opacity));
}
.bg-yellow-400 {
  --tw-bg-opacity: 1;
  background-color: rgb(227 160 8 / var(--tw-bg-opacity));
}
.bg-purple-700 {
  --tw-bg-opacity: 1;
  background-color: rgb(108 43 217 / var(--tw-bg-opacity));
}
.bg-\[\#hex\] {
  background-color: #hex;
}
.bg-\[\#3b5998\] {
  --tw-bg-opacity: 1;
  background-color: rgb(59 89 152 / var(--tw-bg-opacity));
}
.bg-\[\#1da1f2\] {
  --tw-bg-opacity: 1;
  background-color: rgb(29 161 242 / var(--tw-bg-opacity));
}
.bg-\[\#24292F\] {
  --tw-bg-opacity: 1;
  background-color: rgb(36 41 47 / var(--tw-bg-opacity));
}
.bg-\[\#4285F4\] {
  --tw-bg-opacity: 1;
  background-color: rgb(66 133 244 / var(--tw-bg-opacity));
}
.bg-\[\#050708\] {
  --tw-bg-opacity: 1;
  background-color: rgb(5 7 8 / var(--tw-bg-opacity));
}
.bg-\[\#FF9119\] {
  --tw-bg-opacity: 1;
  background-color: rgb(255 145 25 / var(--tw-bg-opacity));
}
.bg-\[\#F7BE38\] {
  --tw-bg-opacity: 1;
  background-color: rgb(247 190 56 / var(--tw-bg-opacity));
}
.bg-\[\#2557D6\] {
  --tw-bg-opacity: 1;
  background-color: rgb(37 87 214 / var(--tw-bg-opacity));
}
.bg-blue-400 {
  --tw-bg-opacity: 1;
  background-color: rgb(118 169 250 / var(--tw-bg-opacity));
}
.bg-white\/30 {
  background-color: rgb(255 255 255 / 0.3);
}
.bg-white\/50 {
  background-color: rgb(255 255 255 / 0.5);
}
.bg-red-600 {
  --tw-bg-opacity: 1;
  background-color: rgb(224 36 36 / var(--tw-bg-opacity));
}
.bg-purple-500 {
  --tw-bg-opacity: 1;
  background-color: rgb(144 97 249 / var(--tw-bg-opacity));
}
.bg-indigo-500 {
  --tw-bg-opacity: 1;
  background-color: rgb(104 117 245 / var(--tw-bg-opacity));
}
.bg-yellow-300 {
  --tw-bg-opacity: 1;
  background-color: rgb(250 202 21 / var(--tw-bg-opacity));
}
.bg-teal-500 {
  --tw-bg-opacity: 1;
  background-color: rgb(6 148 162 / var(--tw-bg-opacity));
}
.bg-gray-500 {
  --tw-bg-opacity: 1;
  background-color: rgb(107 114 128 / var(--tw-bg-opacity));
}
.bg-blue-500 {
  --tw-bg-opacity: 1;
  background-color: rgb(63 131 248 / var(--tw-bg-opacity));
}
.bg-gray-400 {
  --tw-bg-opacity: 1;
  background-color: rgb(156 163 175 / var(--tw-bg-opacity));
}
.bg-orange-300 {
  --tw-bg-opacity: 1;
  background-color: rgb(253 186 140 / var(--tw-bg-opacity));
}
.bg-gray-600 {
  --tw-bg-opacity: 1;
  background-color: rgb(75 85 99 / var(--tw-bg-opacity));
}
.bg-green-600 {
  --tw-bg-opacity: 1;
  background-color: rgb(5 122 85 / var(--tw-bg-opacity));
}
.bg-indigo-600 {
  --tw-bg-opacity: 1;
  background-color: rgb(88 80 236 / var(--tw-bg-opacity));
}
.bg-purple-600 {
  --tw-bg-opacity: 1;
  background-color: rgb(126 58 242 / var(--tw-bg-opacity));
}
.bg-orange-100 {
  --tw-bg-opacity: 1;
  background-color: rgb(254 236 220 / var(--tw-bg-opacity));
}
.bg-green-200 {
  --tw-bg-opacity: 1;
  background-color: rgb(188 240 218 / var(--tw-bg-opacity));
}
.bg-red-200 {
  --tw-bg-opacity: 1;
  background-color: rgb(251 213 213 / var(--tw-bg-opacity));
}
.bg-red-300 {
  --tw-bg-opacity: 1;
  background-color: rgb(248 180 180 / var(--tw-bg-opacity));
}
.bg-red-900 {
  --tw-bg-opacity: 1;
  background-color: rgb(119 29 29 / var(--tw-bg-opacity));
}
.bg-yellow-200 {
  --tw-bg-opacity: 1;
  background-color: rgb(252 233 106 / var(--tw-bg-opacity));
}
.bg-yellow-500 {
  --tw-bg-opacity: 1;
  background-color: rgb(194 120 3 / var(--tw-bg-opacity));
}
.bg-yellow-600 {
  --tw-bg-opacity: 1;
  background-color: rgb(159 88 10 / var(--tw-bg-opacity));
}
.bg-yellow-700 {
  --tw-bg-opacity: 1;
  background-color: rgb(142 75 16 / var(--tw-bg-opacity));
}
.bg-yellow-900 {
  --tw-bg-opacity: 1;
  background-color: rgb(99 49 18 / var(--tw-bg-opacity));
}
.bg-green-300 {
  --tw-bg-opacity: 1;
  background-color: rgb(132 225 188 / var(--tw-bg-opacity));
}
.bg-green-900 {
  --tw-bg-opacity: 1;
  background-color: rgb(1 71 55 / var(--tw-bg-opacity));
}
.bg-blue-300 {
  --tw-bg-opacity: 1;
  background-color: rgb(164 202 254 / var(--tw-bg-opacity));
}
.bg-blue-900 {
  --tw-bg-opacity: 1;
  background-color: rgb(35 56 118 / var(--tw-bg-opacity));
}
.bg-indigo-50 {
  --tw-bg-opacity: 1;
  background-color: rgb(240 245 255 / var(--tw-bg-opacity));
}
.bg-indigo-200 {
  --tw-bg-opacity: 1;
  background-color: rgb(205 219 254 / var(--tw-bg-opacity));
}
.bg-indigo-300 {
  --tw-bg-opacity: 1;
  background-color: rgb(180 198 252 / var(--tw-bg-opacity));
}
.bg-indigo-400 {
  --tw-bg-opacity: 1;
  background-color: rgb(141 162 251 / var(--tw-bg-opacity));
}
.bg-indigo-700 {
  --tw-bg-opacity: 1;
  background-color: rgb(81 69 205 / var(--tw-bg-opacity));
}
.bg-indigo-800 {
  --tw-bg-opacity: 1;
  background-color: rgb(66 56 157 / var(--tw-bg-opacity));
}
.bg-indigo-900 {
  --tw-bg-opacity: 1;
  background-color: rgb(54 47 120 / var(--tw-bg-opacity));
}
.bg-purple-50 {
  --tw-bg-opacity: 1;
  background-color: rgb(246 245 255 / var(--tw-bg-opacity));
}
.bg-purple-200 {
  --tw-bg-opacity: 1;
  background-color: rgb(220 215 254 / var(--tw-bg-opacity));
}
.bg-purple-300 {
  --tw-bg-opacity: 1;
  background-color: rgb(202 191 253 / var(--tw-bg-opacity));
}
.bg-purple-400 {
  --tw-bg-opacity: 1;
  background-color: rgb(172 148 250 / var(--tw-bg-opacity));
}
.bg-purple-800 {
  --tw-bg-opacity: 1;
  background-color: rgb(85 33 181 / var(--tw-bg-opacity));
}
.bg-purple-900 {
  --tw-bg-opacity: 1;
  background-color: rgb(74 29 150 / var(--tw-bg-opacity));
}
.bg-pink-50 {
  --tw-bg-opacity: 1;
  background-color: rgb(253 242 248 / var(--tw-bg-opacity));
}
.bg-pink-200 {
  --tw-bg-opacity: 1;
  background-color: rgb(250 209 232 / var(--tw-bg-opacity));
}
.bg-pink-300 {
  --tw-bg-opacity: 1;
  background-color: rgb(248 180 217 / var(--tw-bg-opacity));
}
.bg-pink-400 {
  --tw-bg-opacity: 1;
  background-color: rgb(241 126 184 / var(--tw-bg-opacity));
}
.bg-pink-500 {
  --tw-bg-opacity: 1;
  background-color: rgb(231 70 148 / var(--tw-bg-opacity));
}
.bg-pink-600 {
  --tw-bg-opacity: 1;
  background-color: rgb(214 31 105 / var(--tw-bg-opacity));
}
.bg-pink-700 {
  --tw-bg-opacity: 1;
  background-color: rgb(191 18 93 / var(--tw-bg-opacity));
}
.bg-pink-800 {
  --tw-bg-opacity: 1;
  background-color: rgb(153 21 75 / var(--tw-bg-opacity));
}
.bg-pink-900 {
  --tw-bg-opacity: 1;
  background-color: rgb(117 26 61 / var(--tw-bg-opacity));
}
.bg-opacity-50 {
  --tw-bg-opacity: 0.5;
}
.bg-gradient-to-r {
  background-image: linear-gradient(to right, var(--tw-gradient-stops));
}
.bg-gradient-to-br {
  background-image: linear-gradient(to bottom right, var(--tw-gradient-stops));
}
.from-blue-500 {
  --tw-gradient-from: #3F83F8;
  --tw-gradient-to: rgb(63 131 248 / 0);
  --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
}
.from-green-400 {
  --tw-gradient-from: #31C48D;
  --tw-gradient-to: rgb(49 196 141 / 0);
  --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
}
.from-cyan-400 {
  --tw-gradient-from: #22d3ee;
  --tw-gradient-to: rgb(34 211 238 / 0);
  --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
}
.from-teal-400 {
  --tw-gradient-from: #16BDCA;
  --tw-gradient-to: rgb(22 189 202 / 0);
  --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
}
.from-lime-200 {
  --tw-gradient-from: #d9f99d;
  --tw-gradient-to: rgb(217 249 157 / 0);
  --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
}
.from-red-400 {
  --tw-gradient-from: #F98080;
  --tw-gradient-to: rgb(249 128 128 / 0);
  --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
}
.from-pink-400 {
  --tw-gradient-from: #F17EB8;
  --tw-gradient-to: rgb(241 126 184 / 0);
  --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
}
.from-purple-500 {
  --tw-gradient-from: #9061F9;
  --tw-gradient-to: rgb(144 97 249 / 0);
  --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
}
.from-purple-600 {
  --tw-gradient-from: #7E3AF2;
  --tw-gradient-to: rgb(126 58 242 / 0);
  --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
}
.from-cyan-500 {
  --tw-gradient-from: #06b6d4;
  --tw-gradient-to: rgb(6 182 212 / 0);
  --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
}
.from-pink-500 {
  --tw-gradient-from: #E74694;
  --tw-gradient-to: rgb(231 70 148 / 0);
  --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
}
.from-teal-200 {
  --tw-gradient-from: #AFECEF;
  --tw-gradient-to: rgb(175 236 239 / 0);
  --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
}
.from-red-200 {
  --tw-gradient-from: #FBD5D5;
  --tw-gradient-to: rgb(251 213 213 / 0);
  --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
}
.from-teal-300 {
  --tw-gradient-from: #7EDCE2;
  --tw-gradient-to: rgb(126 220 226 / 0);
  --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
}
.from-sky-400 {
  --tw-gradient-from: #38bdf8;
  --tw-gradient-to: rgb(56 189 248 / 0);
  --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
}
.via-blue-600 {
  --tw-gradient-to: rgb(28 100 242 / 0);
  --tw-gradient-stops: var(--tw-gradient-from), #1C64F2, var(--tw-gradient-to);
}
.via-green-500 {
  --tw-gradient-to: rgb(14 159 110 / 0);
  --tw-gradient-stops: var(--tw-gradient-from), #0E9F6E, var(--tw-gradient-to);
}
.via-cyan-500 {
  --tw-gradient-to: rgb(6 182 212 / 0);
  --tw-gradient-stops: var(--tw-gradient-from), #06b6d4, var(--tw-gradient-to);
}
.via-teal-500 {
  --tw-gradient-to: rgb(6 148 162 / 0);
  --tw-gradient-stops: var(--tw-gradient-from), #0694A2, var(--tw-gradient-to);
}
.via-lime-400 {
  --tw-gradient-to: rgb(163 230 53 / 0);
  --tw-gradient-stops: var(--tw-gradient-from), #a3e635, var(--tw-gradient-to);
}
.via-red-500 {
  --tw-gradient-to: rgb(240 82 82 / 0);
  --tw-gradient-stops: var(--tw-gradient-from), #F05252, var(--tw-gradient-to);
}
.via-pink-500 {
  --tw-gradient-to: rgb(231 70 148 / 0);
  --tw-gradient-stops: var(--tw-gradient-from), #E74694, var(--tw-gradient-to);
}
.via-purple-600 {
  --tw-gradient-to: rgb(126 58 242 / 0);
  --tw-gradient-stops: var(--tw-gradient-from), #7E3AF2, var(--tw-gradient-to);
}
.via-red-300 {
  --tw-gradient-to: rgb(248 180 180 / 0);
  --tw-gradient-stops: var(--tw-gradient-from), #F8B4B4, var(--tw-gradient-to);
}
.to-blue-700 {
  --tw-gradient-to: #1A56DB;
}
.to-green-600 {
  --tw-gradient-to: #057A55;
}
.to-cyan-600 {
  --tw-gradient-to: #0891b2;
}
.to-teal-600 {
  --tw-gradient-to: #047481;
}
.to-lime-500 {
  --tw-gradient-to: #84cc16;
}
.to-red-600 {
  --tw-gradient-to: #E02424;
}
.to-pink-600 {
  --tw-gradient-to: #D61F69;
}
.to-purple-700 {
  --tw-gradient-to: #6C2BD9;
}
.to-blue-500 {
  --tw-gradient-to: #3F83F8;
}
.to-blue-600 {
  --tw-gradient-to: #1C64F2;
}
.to-pink-500 {
  --tw-gradient-to: #E74694;
}
.to-orange-400 {
  --tw-gradient-to: #FF8A4C;
}
.to-lime-200 {
  --tw-gradient-to: #d9f99d;
}
.to-yellow-200 {
  --tw-gradient-to: #FCE96A;
}
.to-lime-300 {
  --tw-gradient-to: #bef264;
}
.to-emerald-600 {
  --tw-gradient-to: #059669;
}
.bg-cover {
  background-size: cover;
}
.bg-local {
  background-attachment: local;
}
.bg-clip-text {
  -webkit-background-clip: text;
          background-clip: text;
}
.bg-center {
  background-position: center;
}
.bg-no-repeat {
  background-repeat: no-repeat;
}
.fill-blue-600 {
  fill: #1C64F2;
}
.fill-current {
  fill: currentColor;
}
.fill-gray-600 {
  fill: #4B5563;
}
.fill-green-500 {
  fill: #0E9F6E;
}
.fill-red-600 {
  fill: #E02424;
}
.fill-yellow-400 {
  fill: #E3A008;
}
.fill-pink-600 {
  fill: #D61F69;
}
.fill-purple-600 {
  fill: #7E3AF2;
}
.object-cover {
  -o-object-fit: cover;
     object-fit: cover;
}
.p-4 {
  padding: 1rem;
}
.p-2\.5 {
  padding: 0.625rem;
}
.p-2 {
  padding: 0.5rem;
}
.p-0 {
  padding: 0px;
}
.p-5 {
  padding: 1.25rem;
}
.p-6 {
  padding: 1.5rem;
}
.p-1\.5 {
  padding: 0.375rem;
}
.p-1 {
  padding: 0.25rem;
}
.p-3 {
  padding: 0.75rem;
}
.p-0\.5 {
  padding: 0.125rem;
}
.p-8 {
  padding: 2rem;
}
.px-4 {
  padding-left: 1rem;
  padding-right: 1rem;
}
.px-1 {
  padding-left: 0.25rem;
  padding-right: 0.25rem;
}
.py-1 {
  padding-top: 0.25rem;
  padding-bottom: 0.25rem;
}
.px-3 {
  padding-left: 0.75rem;
  padding-right: 0.75rem;
}
.py-1\.5 {
  padding-top: 0.375rem;
  padding-bottom: 0.375rem;
}
.py-px {
  padding-top: 1px;
  padding-bottom: 1px;
}
.px-5 {
  padding-left: 1.25rem;
  padding-right: 1.25rem;
}
.py-3 {
  padding-top: 0.75rem;
  padding-bottom: 0.75rem;
}
.py-12 {
  padding-top: 3rem;
  padding-bottom: 3rem;
}
.px-2\.5 {
  padding-left: 0.625rem;
  padding-right: 0.625rem;
}
.py-0\.5 {
  padding-top: 0.125rem;
  padding-bottom: 0.125rem;
}
.px-2 {
  padding-left: 0.5rem;
  padding-right: 0.5rem;
}
.py-0 {
  padding-top: 0px;
  padding-bottom: 0px;
}
.py-2 {
  padding-top: 0.5rem;
  padding-bottom: 0.5rem;
}
.py-2\.5 {
  padding-top: 0.625rem;
  padding-bottom: 0.625rem;
}
.px-1\.5 {
  padding-left: 0.375rem;
  padding-right: 0.375rem;
}
.py-5 {
  padding-top: 1.25rem;
  padding-bottom: 1.25rem;
}
.px-6 {
  padding-left: 1.5rem;
  padding-right: 1.5rem;
}
.py-4 {
  padding-top: 1rem;
  padding-bottom: 1rem;
}
.px-8 {
  padding-left: 2rem;
  padding-right: 2rem;
}
.py-3\.5 {
  padding-top: 0.875rem;
  padding-bottom: 0.875rem;
}
.py-48 {
  padding-top: 12rem;
  padding-bottom: 12rem;
}
.py-8 {
  padding-top: 2rem;
  padding-bottom: 2rem;
}
.py-6 {
  padding-top: 1.5rem;
  padding-bottom: 1.5rem;
}
.px-0 {
  padding-left: 0px;
  padding-right: 0px;
}
.py-24 {
  padding-top: 6rem;
  padding-bottom: 6rem;
}
.px-0\.5 {
  padding-left: 0.125rem;
  padding-right: 0.125rem;
}
.pt-4 {
  padding-top: 1rem;
}
.pb-4 {
  padding-bottom: 1rem;
}
.pt-6 {
  padding-top: 1.5rem;
}
.pr-4 {
  padding-right: 1rem;
}
.pl-3 {
  padding-left: 0.75rem;
}
.pl-10 {
  padding-left: 2.5rem;
}
.pl-8 {
  padding-left: 2rem;
}
.pt-10 {
  padding-top: 2.5rem;
}
.pb-6 {
  padding-bottom: 1.5rem;
}
.pl-2\.5 {
  padding-left: 0.625rem;
}
.pl-2 {
  padding-left: 0.5rem;
}
.pt-16 {
  padding-top: 4rem;
}
.pb-10 {
  padding-bottom: 2.5rem;
}
.pl-5 {
  padding-left: 1.25rem;
}
.pt-8 {
  padding-top: 2rem;
}
.pb-48 {
  padding-bottom: 12rem;
}
.pb-5 {
  padding-bottom: 1.25rem;
}
.pt-3 {
  padding-top: 0.75rem;
}
.pb-0 {
  padding-bottom: 0px;
}
.pl-11 {
  padding-left: 2.75rem;
}
.pb-3 {
  padding-bottom: 0.75rem;
}
.pt-24 {
  padding-top: 6rem;
}
.pt-52 {
  padding-top: 13rem;
}
.pt-80 {
  padding-top: 20rem;
}
.pt-64 {
  padding-top: 16rem;
}
.pb-96 {
  padding-bottom: 24rem;
}
.pt-36 {
  padding-top: 9rem;
}
.pb-16 {
  padding-bottom: 4rem;
}
.pt-32 {
  padding-top: 8rem;
}
.pl-4 {
  padding-left: 1rem;
}
.pt-20 {
  padding-top: 5rem;
}
.pt-5 {
  padding-top: 1.25rem;
}
.pb-2\.5 {
  padding-bottom: 0.625rem;
}
.pb-2 {
  padding-bottom: 0.5rem;
}
.pb-1\.5 {
  padding-bottom: 0.375rem;
}
.pb-1 {
  padding-bottom: 0.25rem;
}
.pr-3 {
  padding-right: 0.75rem;
}
.pl-0 {
  padding-left: 0px;
}
.pb-8 {
  padding-bottom: 2rem;
}
.pt-60 {
  padding-top: 15rem;
}
.text-left {
  text-align: left;
}
.text-center {
  text-align: center;
}
.text-right {
  text-align: right;
}
.text-justify {
  text-align: justify;
}
.font-sans {
  font-family: Inter, ui-sans-serif, system-ui, -apple-system, system-ui, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
}
.text-sm {
  font-size: 0.875rem;
  line-height: 1.25rem;
}
.text-xs {
  font-size: 0.75rem;
  line-height: 1rem;
}
.text-3xl {
  font-size: 1.875rem;
  line-height: 2.25rem;
}
.text-lg {
  font-size: 1.125rem;
  line-height: 1.75rem;
}
.text-xl {
  font-size: 1.25rem;
  line-height: 1.75rem;
}
.text-2xl {
  font-size: 1.5rem;
  line-height: 2rem;
}
.text-base {
  font-size: 1rem;
  line-height: 1.5rem;
}
.text-2xs {
  font-size: 0.625rem;
}
.text-5xl {
  font-size: 3rem;
  line-height: 1;
}
.text-4xl {
  font-size: 2.25rem;
  line-height: 2.5rem;
}
.text-6xl {
  font-size: 3.75rem;
  line-height: 1;
}
.text-7xl {
  font-size: 4.5rem;
  line-height: 1;
}
.text-8xl {
  font-size: 6rem;
  line-height: 1;
}
.text-9xl {
  font-size: 8rem;
  line-height: 1;
}
.font-medium {
  font-weight: 500;
}
.font-extrabold {
  font-weight: 800;
}
.font-semibold {
  font-weight: 600;
}
.font-normal {
  font-weight: 400;
}
.font-light {
  font-weight: 300;
}
.font-bold {
  font-weight: 700;
}
.font-thin {
  font-weight: 100;
}
.font-extralight {
  font-weight: 200;
}
.font-black {
  font-weight: 900;
}
.uppercase {
  text-transform: uppercase;
}
.lowercase {
  text-transform: lowercase;
}
.italic {
  font-style: italic;
}
.leading-6 {
  line-height: 1.5rem;
}
.leading-9 {
  line-height: 2.25rem;
}
.leading-normal {
  line-height: 1.5;
}
.leading-tight {
  line-height: 1.25;
}
.leading-none {
  line-height: 1;
}
.leading-relaxed {
  line-height: 1.625;
}
.leading-loose {
  line-height: 2;
}
.tracking-tight {
  letter-spacing: -0.025em;
}
.tracking-wide {
  letter-spacing: 0.025em;
}
.tracking-tighter {
  letter-spacing: -0.05em;
}
.tracking-normal {
  letter-spacing: 0em;
}
.tracking-wider {
  letter-spacing: 0.05em;
}
.tracking-widest {
  letter-spacing: 0.1em;
}
.text-gray-700 {
  --tw-text-opacity: 1;
  color: rgb(55 65 81 / var(--tw-text-opacity));
}
.text-white {
  --tw-text-opacity: 1;
  color: rgb(255 255 255 / var(--tw-text-opacity));
}
.text-\[\#ff2d20\] {
  --tw-text-opacity: 1;
  color: rgb(255 45 32 / var(--tw-text-opacity));
}
.text-gray-900 {
  --tw-text-opacity: 1;
  color: rgb(17 24 39 / var(--tw-text-opacity));
}
.text-gray-500 {
  --tw-text-opacity: 1;
  color: rgb(107 114 128 / var(--tw-text-opacity));
}
.text-blue-600 {
  --tw-text-opacity: 1;
  color: rgb(28 100 242 / var(--tw-text-opacity));
}
.text-green-700 {
  --tw-text-opacity: 1;
  color: rgb(4 108 78 / var(--tw-text-opacity));
}
.text-gray-600 {
  --tw-text-opacity: 1;
  color: rgb(75 85 99 / var(--tw-text-opacity));
}
.text-gray-400 {
  --tw-text-opacity: 1;
  color: rgb(156 163 175 / var(--tw-text-opacity));
}
.text-blue-800 {
  --tw-text-opacity: 1;
  color: rgb(30 66 159 / var(--tw-text-opacity));
}
.text-blue-700 {
  --tw-text-opacity: 1;
  color: rgb(26 86 219 / var(--tw-text-opacity));
}
.text-gray-200 {
  --tw-text-opacity: 1;
  color: rgb(229 231 235 / var(--tw-text-opacity));
}
.text-gray-800 {
  --tw-text-opacity: 1;
  color: rgb(31 41 55 / var(--tw-text-opacity));
}
.text-red-800 {
  --tw-text-opacity: 1;
  color: rgb(155 28 28 / var(--tw-text-opacity));
}
.text-green-800 {
  --tw-text-opacity: 1;
  color: rgb(3 84 63 / var(--tw-text-opacity));
}
.text-yellow-800 {
  --tw-text-opacity: 1;
  color: rgb(114 59 19 / var(--tw-text-opacity));
}
.text-blue-500 {
  --tw-text-opacity: 1;
  color: rgb(63 131 248 / var(--tw-text-opacity));
}
.text-red-500 {
  --tw-text-opacity: 1;
  color: rgb(240 82 82 / var(--tw-text-opacity));
}
.text-green-500 {
  --tw-text-opacity: 1;
  color: rgb(14 159 110 / var(--tw-text-opacity));
}
.text-yellow-500 {
  --tw-text-opacity: 1;
  color: rgb(194 120 3 / var(--tw-text-opacity));
}
.text-purple-600 {
  --tw-text-opacity: 1;
  color: rgb(126 58 242 / var(--tw-text-opacity));
}
.text-indigo-800 {
  --tw-text-opacity: 1;
  color: rgb(66 56 157 / var(--tw-text-opacity));
}
.text-purple-800 {
  --tw-text-opacity: 1;
  color: rgb(85 33 181 / var(--tw-text-opacity));
}
.text-pink-800 {
  --tw-text-opacity: 1;
  color: rgb(153 21 75 / var(--tw-text-opacity));
}
.text-blue-400 {
  --tw-text-opacity: 1;
  color: rgb(118 169 250 / var(--tw-text-opacity));
}
.text-red-400 {
  --tw-text-opacity: 1;
  color: rgb(249 128 128 / var(--tw-text-opacity));
}
.text-green-400 {
  --tw-text-opacity: 1;
  color: rgb(49 196 141 / var(--tw-text-opacity));
}
.text-yellow-400 {
  --tw-text-opacity: 1;
  color: rgb(227 160 8 / var(--tw-text-opacity));
}
.text-indigo-400 {
  --tw-text-opacity: 1;
  color: rgb(141 162 251 / var(--tw-text-opacity));
}
.text-purple-400 {
  --tw-text-opacity: 1;
  color: rgb(172 148 250 / var(--tw-text-opacity));
}
.text-pink-400 {
  --tw-text-opacity: 1;
  color: rgb(241 126 184 / var(--tw-text-opacity));
}
.text-\[\#626890\] {
  --tw-text-opacity: 1;
  color: rgb(98 104 144 / var(--tw-text-opacity));
}
.text-red-700 {
  --tw-text-opacity: 1;
  color: rgb(200 30 30 / var(--tw-text-opacity));
}
.text-purple-700 {
  --tw-text-opacity: 1;
  color: rgb(108 43 217 / var(--tw-text-opacity));
}
.text-red-600 {
  --tw-text-opacity: 1;
  color: rgb(224 36 36 / var(--tw-text-opacity));
}
.text-yellow-300 {
  --tw-text-opacity: 1;
  color: rgb(250 202 21 / var(--tw-text-opacity));
}
.text-green-900 {
  --tw-text-opacity: 1;
  color: rgb(1 71 55 / var(--tw-text-opacity));
}
.text-green-600 {
  --tw-text-opacity: 1;
  color: rgb(5 122 85 / var(--tw-text-opacity));
}
.text-red-900 {
  --tw-text-opacity: 1;
  color: rgb(119 29 29 / var(--tw-text-opacity));
}
.text-gray-300 {
  --tw-text-opacity: 1;
  color: rgb(209 213 219 / var(--tw-text-opacity));
}
.text-blue-100 {
  --tw-text-opacity: 1;
  color: rgb(225 239 254 / var(--tw-text-opacity));
}
.text-yellow-700 {
  --tw-text-opacity: 1;
  color: rgb(142 75 16 / var(--tw-text-opacity));
}
.text-indigo-700 {
  --tw-text-opacity: 1;
  color: rgb(81 69 205 / var(--tw-text-opacity));
}
.text-orange-800 {
  --tw-text-opacity: 1;
  color: rgb(138 44 13 / var(--tw-text-opacity));
}
.text-blue-900 {
  --tw-text-opacity: 1;
  color: rgb(35 56 118 / var(--tw-text-opacity));
}
.text-blue-50 {
  --tw-text-opacity: 1;
  color: rgb(235 245 255 / var(--tw-text-opacity));
}
.text-orange-500 {
  --tw-text-opacity: 1;
  color: rgb(255 90 31 / var(--tw-text-opacity));
}
.text-teal-600 {
  --tw-text-opacity: 1;
  color: rgb(4 116 129 / var(--tw-text-opacity));
}
.text-sky-500 {
  --tw-text-opacity: 1;
  color: rgb(14 165 233 / var(--tw-text-opacity));
}
.text-transparent {
  color: transparent;
}
.text-blue-600\/100 {
  color: rgb(28 100 242 / 1);
}
.text-blue-600\/75 {
  color: rgb(28 100 242 / 0.75);
}
.text-blue-600\/50 {
  color: rgb(28 100 242 / 0.5);
}
.text-blue-600\/25 {
  color: rgb(28 100 242 / 0.25);
}
.\!text-blue-700 {
  --tw-text-opacity: 1 !important;
  color: rgb(26 86 219 / var(--tw-text-opacity)) !important;
}
.underline {
  text-decoration-line: underline;
}
.line-through {
  text-decoration-line: line-through;
}
.no-underline {
  text-decoration-line: none;
}
.decoration-gray-500 {
  text-decoration-color: #6B7280;
}
.decoration-blue-400 {
  text-decoration-color: #76A9FA;
}
.decoration-indigo-500 {
  text-decoration-color: #6875F5;
}
.decoration-blue-500 {
  text-decoration-color: #3F83F8;
}
.decoration-green-500 {
  text-decoration-color: #0E9F6E;
}
.decoration-red-500 {
  text-decoration-color: #F05252;
}
.decoration-sky-500 {
  text-decoration-color: #0ea5e9;
}
.decoration-solid {
  text-decoration-style: solid;
}
.decoration-double {
  text-decoration-style: double;
}
.decoration-dotted {
  text-decoration-style: dotted;
}
.decoration-dashed {
  text-decoration-style: dashed;
}
.decoration-wavy {
  text-decoration-style: wavy;
}
.decoration-8 {
  text-decoration-thickness: 8px;
}
.underline-offset-2 {
  text-underline-offset: 2px;
}
.placeholder-green-700::-moz-placeholder {
  --tw-placeholder-opacity: 1;
  color: rgb(4 108 78 / var(--tw-placeholder-opacity));
}
.placeholder-green-700::placeholder {
  --tw-placeholder-opacity: 1;
  color: rgb(4 108 78 / var(--tw-placeholder-opacity));
}
.placeholder-red-700::-moz-placeholder {
  --tw-placeholder-opacity: 1;
  color: rgb(200 30 30 / var(--tw-placeholder-opacity));
}
.placeholder-red-700::placeholder {
  --tw-placeholder-opacity: 1;
  color: rgb(200 30 30 / var(--tw-placeholder-opacity));
}
.opacity-0 {
  opacity: 0;
}
.opacity-20 {
  opacity: 0.2;
}
.opacity-100 {
  opacity: 1;
}
.bg-blend-multiply {
  background-blend-mode: multiply;
}
.shadow-lg {
  --tw-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
  --tw-shadow-colored: 0 10px 15px -3px var(--tw-shadow-color), 0 4px 6px -4px var(--tw-shadow-color);
  box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
}
.shadow-md {
  --tw-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
  --tw-shadow-colored: 0 4px 6px -1px var(--tw-shadow-color), 0 2px 4px -2px var(--tw-shadow-color);
  box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
}
.shadow-sm {
  --tw-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05);
  --tw-shadow-colored: 0 1px 2px 0 var(--tw-shadow-color);
  box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
}
.shadow {
  --tw-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
  --tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);
  box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
}
.shadow-xl {
  --tw-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
  --tw-shadow-colored: 0 20px 25px -5px var(--tw-shadow-color), 0 8px 10px -6px var(--tw-shadow-color);
  box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
}
.shadow-blue-500\/50 {
  --tw-shadow-color: rgb(63 131 248 / 0.5);
  --tw-shadow: var(--tw-shadow-colored);
}
.shadow-green-500\/50 {
  --tw-shadow-color: rgb(14 159 110 / 0.5);
  --tw-shadow: var(--tw-shadow-colored);
}
.shadow-cyan-500\/50 {
  --tw-shadow-color: rgb(6 182 212 / 0.5);
  --tw-shadow: var(--tw-shadow-colored);
}
.shadow-teal-500\/50 {
  --tw-shadow-color: rgb(6 148 162 / 0.5);
  --tw-shadow: var(--tw-shadow-colored);
}
.shadow-lime-500\/50 {
  --tw-shadow-color: rgb(132 204 22 / 0.5);
  --tw-shadow: var(--tw-shadow-colored);
}
.shadow-red-500\/50 {
  --tw-shadow-color: rgb(240 82 82 / 0.5);
  --tw-shadow: var(--tw-shadow-colored);
}
.shadow-pink-500\/50 {
  --tw-shadow-color: rgb(231 70 148 / 0.5);
  --tw-shadow: var(--tw-shadow-colored);
}
.shadow-purple-500\/50 {
  --tw-shadow-color: rgb(144 97 249 / 0.5);
  --tw-shadow: var(--tw-shadow-colored);
}
.outline {
  outline-style: solid;
}
.ring-2 {
  --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
  --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);
  box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
}
.ring-0 {
  --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
  --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(0px + var(--tw-ring-offset-width)) var(--tw-ring-color);
  box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
}
.ring-4 {
  --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
  --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(4px + var(--tw-ring-offset-width)) var(--tw-ring-color);
  box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
}
.ring-8 {
  --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
  --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(8px + var(--tw-ring-offset-width)) var(--tw-ring-color);
  box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
}
.ring-1 {
  --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
  --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);
  box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
}
.ring-inset {
  --tw-ring-inset: inset;
}
.ring-gray-300 {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(209 213 219 / var(--tw-ring-opacity));
}
.ring-white {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(255 255 255 / var(--tw-ring-opacity));
}
.ring-black {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(0 0 0 / var(--tw-ring-opacity));
}
.ring-opacity-0 {
  --tw-ring-opacity: 0;
}
.blur {
  --tw-blur: blur(8px);
  filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow);
}
.blur-sm {
  --tw-blur: blur(4px);
  filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow);
}
.grayscale {
  --tw-grayscale: grayscale(100%);
  filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow);
}
.invert {
  --tw-invert: invert(100%);
  filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow);
}
.filter {
  filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow);
}
.transition-colors {
  transition-property: color, background-color, border-color, text-decoration-color, fill, stroke;
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
  transition-duration: 150ms;
}
.transition-opacity {
  transition-property: opacity;
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
  transition-duration: 150ms;
}
.transition {
  transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, -webkit-backdrop-filter;
  transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;
  transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-backdrop-filter;
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
  transition-duration: 150ms;
}
.transition-all {
  transition-property: all;
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
  transition-duration: 150ms;
}
.transition-transform {
  transition-property: transform;
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
  transition-duration: 150ms;
}
.duration-200 {
  transition-duration: 200ms;
}
.duration-300 {
  transition-duration: 300ms;
}
.duration-75 {
  transition-duration: 75ms;
}
.duration-700 {
  transition-duration: 700ms;
}
.ease-out {
  transition-timing-function: cubic-bezier(0, 0, 0.2, 1);
}
.ease-in {
  transition-timing-function: cubic-bezier(0.4, 0, 1, 1);
}
.ease-in-out {
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
}
.ease-linear {
  transition-timing-function: linear;
}

/*
“Have the courage to follow your heart and intuition. They somehow already know what you truly want to become. Everything else is secondary.”
― Steve Jobs
*/

.first-letter\:float-left::first-letter {
  float: left;
}

.first-letter\:mr-3::first-letter {
  margin-right: 0.75rem;
}

.first-letter\:text-7xl::first-letter {
  font-size: 4.5rem;
  line-height: 1;
}

.first-letter\:font-bold::first-letter {
  font-weight: 700;
}

.first-letter\:text-gray-900::first-letter {
  --tw-text-opacity: 1;
  color: rgb(17 24 39 / var(--tw-text-opacity));
}

.first-line\:uppercase::first-line {
  text-transform: uppercase;
}

.first-line\:tracking-widest::first-line {
  letter-spacing: 0.1em;
}

.after\:absolute::after {
  content: var(--tw-content);
  position: absolute;
}

.after\:top-\[2px\]::after {
  content: var(--tw-content);
  top: 2px;
}

.after\:left-\[2px\]::after {
  content: var(--tw-content);
  left: 2px;
}

.after\:top-0\.5::after {
  content: var(--tw-content);
  top: 0.125rem;
}

.after\:top-0::after {
  content: var(--tw-content);
  top: 0px;
}

.after\:left-\[4px\]::after {
  content: var(--tw-content);
  left: 4px;
}

.after\:mx-6::after {
  content: var(--tw-content);
  margin-left: 1.5rem;
  margin-right: 1.5rem;
}

.after\:mx-2::after {
  content: var(--tw-content);
  margin-left: 0.5rem;
  margin-right: 0.5rem;
}

.after\:inline-block::after {
  content: var(--tw-content);
  display: inline-block;
}

.after\:hidden::after {
  content: var(--tw-content);
  display: none;
}

.after\:h-4::after {
  content: var(--tw-content);
  height: 1rem;
}

.after\:h-5::after {
  content: var(--tw-content);
  height: 1.25rem;
}

.after\:h-1::after {
  content: var(--tw-content);
  height: 0.25rem;
}

.after\:h-6::after {
  content: var(--tw-content);
  height: 1.5rem;
}

.after\:w-4::after {
  content: var(--tw-content);
  width: 1rem;
}

.after\:w-5::after {
  content: var(--tw-content);
  width: 1.25rem;
}

.after\:w-full::after {
  content: var(--tw-content);
  width: 100%;
}

.after\:w-6::after {
  content: var(--tw-content);
  width: 1.5rem;
}

.after\:rounded-full::after {
  content: var(--tw-content);
  border-radius: 9999px;
}

.after\:border::after {
  content: var(--tw-content);
  border-width: 1px;
}

.after\:border-4::after {
  content: var(--tw-content);
  border-width: 4px;
}

.after\:border-b::after {
  content: var(--tw-content);
  border-bottom-width: 1px;
}

.after\:border-gray-300::after {
  content: var(--tw-content);
  --tw-border-opacity: 1;
  border-color: rgb(209 213 219 / var(--tw-border-opacity));
}

.after\:border-gray-200::after {
  content: var(--tw-content);
  --tw-border-opacity: 1;
  border-color: rgb(229 231 235 / var(--tw-border-opacity));
}

.after\:border-blue-100::after {
  content: var(--tw-content);
  --tw-border-opacity: 1;
  border-color: rgb(225 239 254 / var(--tw-border-opacity));
}

.after\:border-gray-100::after {
  content: var(--tw-content);
  --tw-border-opacity: 1;
  border-color: rgb(243 244 246 / var(--tw-border-opacity));
}

.after\:bg-white::after {
  content: var(--tw-content);
  --tw-bg-opacity: 1;
  background-color: rgb(255 255 255 / var(--tw-bg-opacity));
}

.after\:font-light::after {
  content: var(--tw-content);
  font-weight: 300;
}

.after\:text-gray-200::after {
  content: var(--tw-content);
  --tw-text-opacity: 1;
  color: rgb(229 231 235 / var(--tw-text-opacity));
}

.after\:transition-all::after {
  content: var(--tw-content);
  transition-property: all;
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
  transition-duration: 150ms;
}

.after\:content-\[\'\'\]::after {
  --tw-content: '';
  content: var(--tw-content);
}

.after\:content-\[\'\/\'\]::after {
  --tw-content: '/';
  content: var(--tw-content);
}

.hover\:border-gray-300:hover {
  --tw-border-opacity: 1;
  border-color: rgb(209 213 219 / var(--tw-border-opacity));
}

.hover\:bg-gray-200:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(229 231 235 / var(--tw-bg-opacity));
}

.hover\:bg-blue-800:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(30 66 159 / var(--tw-bg-opacity));
}

.hover\:bg-gray-100:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(243 244 246 / var(--tw-bg-opacity));
}

.hover\:bg-blue-100:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(225 239 254 / var(--tw-bg-opacity));
}

.hover\:bg-blue-200:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(195 221 253 / var(--tw-bg-opacity));
}

.hover\:bg-red-200:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(251 213 213 / var(--tw-bg-opacity));
}

.hover\:bg-green-200:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(188 240 218 / var(--tw-bg-opacity));
}

.hover\:bg-yellow-200:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(252 233 106 / var(--tw-bg-opacity));
}

.hover\:bg-blue-900:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(35 56 118 / var(--tw-bg-opacity));
}

.hover\:bg-red-900:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(119 29 29 / var(--tw-bg-opacity));
}

.hover\:bg-green-900:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(1 71 55 / var(--tw-bg-opacity));
}

.hover\:bg-yellow-900:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(99 49 18 / var(--tw-bg-opacity));
}

.hover\:bg-gray-800:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(31 41 55 / var(--tw-bg-opacity));
}

.hover\:bg-gray-600:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(75 85 99 / var(--tw-bg-opacity));
}

.hover\:bg-indigo-200:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(205 219 254 / var(--tw-bg-opacity));
}

.hover\:bg-purple-200:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(220 215 254 / var(--tw-bg-opacity));
}

.hover\:bg-pink-200:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(250 209 232 / var(--tw-bg-opacity));
}

.hover\:bg-gray-50:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(249 250 251 / var(--tw-bg-opacity));
}

.hover\:bg-blue-700:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(26 86 219 / var(--tw-bg-opacity));
}

.hover\:bg-gray-300:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(209 213 219 / var(--tw-bg-opacity));
}

.hover\:bg-gray-900:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(17 24 39 / var(--tw-bg-opacity));
}

.hover\:bg-green-800:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(3 84 63 / var(--tw-bg-opacity));
}

.hover\:bg-red-800:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(155 28 28 / var(--tw-bg-opacity));
}

.hover\:bg-yellow-500:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(194 120 3 / var(--tw-bg-opacity));
}

.hover\:bg-purple-800:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(85 33 181 / var(--tw-bg-opacity));
}

.hover\:bg-\[\#3b5998\]\/90:hover {
  background-color: rgb(59 89 152 / 0.9);
}

.hover\:bg-\[\#1da1f2\]\/90:hover {
  background-color: rgb(29 161 242 / 0.9);
}

.hover\:bg-\[\#24292F\]\/90:hover {
  background-color: rgb(36 41 47 / 0.9);
}

.hover\:bg-\[\#4285F4\]\/90:hover {
  background-color: rgb(66 133 244 / 0.9);
}

.hover\:bg-\[\#050708\]\/90:hover {
  background-color: rgb(5 7 8 / 0.9);
}

.hover\:bg-\[\#FF9119\]\/80:hover {
  background-color: rgb(255 145 25 / 0.8);
}

.hover\:bg-\[\#F7BE38\]\/90:hover {
  background-color: rgb(247 190 56 / 0.9);
}

.hover\:bg-\[\#050708\]\/80:hover {
  background-color: rgb(5 7 8 / 0.8);
}

.hover\:bg-\[\#2557D6\]\/90:hover {
  background-color: rgb(37 87 214 / 0.9);
}

.hover\:bg-gray-700:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(55 65 81 / var(--tw-bg-opacity));
}

.hover\:bg-white:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(255 255 255 / var(--tw-bg-opacity));
}

.hover\:bg-gray-500:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(107 114 128 / var(--tw-bg-opacity));
}

.hover\:bg-blue-500:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(63 131 248 / var(--tw-bg-opacity));
}

.hover\:bg-gradient-to-br:hover {
  background-image: linear-gradient(to bottom right, var(--tw-gradient-stops));
}

.hover\:bg-gradient-to-bl:hover {
  background-image: linear-gradient(to bottom left, var(--tw-gradient-stops));
}

.hover\:bg-gradient-to-l:hover {
  background-image: linear-gradient(to left, var(--tw-gradient-stops));
}

.hover\:from-teal-200:hover {
  --tw-gradient-from: #AFECEF;
  --tw-gradient-to: rgb(175 236 239 / 0);
  --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
}

.hover\:to-lime-200:hover {
  --tw-gradient-to: #d9f99d;
}

.hover\:text-gray-900:hover {
  --tw-text-opacity: 1;
  color: rgb(17 24 39 / var(--tw-text-opacity));
}

.hover\:text-blue-600:hover {
  --tw-text-opacity: 1;
  color: rgb(28 100 242 / var(--tw-text-opacity));
}

.hover\:text-blue-700:hover {
  --tw-text-opacity: 1;
  color: rgb(26 86 219 / var(--tw-text-opacity));
}

.hover\:text-gray-800:hover {
  --tw-text-opacity: 1;
  color: rgb(31 41 55 / var(--tw-text-opacity));
}

.hover\:text-white:hover {
  --tw-text-opacity: 1;
  color: rgb(255 255 255 / var(--tw-text-opacity));
}

.hover\:text-blue-900:hover {
  --tw-text-opacity: 1;
  color: rgb(35 56 118 / var(--tw-text-opacity));
}

.hover\:text-red-900:hover {
  --tw-text-opacity: 1;
  color: rgb(119 29 29 / var(--tw-text-opacity));
}

.hover\:text-green-900:hover {
  --tw-text-opacity: 1;
  color: rgb(1 71 55 / var(--tw-text-opacity));
}

.hover\:text-yellow-900:hover {
  --tw-text-opacity: 1;
  color: rgb(99 49 18 / var(--tw-text-opacity));
}

.hover\:text-indigo-900:hover {
  --tw-text-opacity: 1;
  color: rgb(54 47 120 / var(--tw-text-opacity));
}

.hover\:text-purple-900:hover {
  --tw-text-opacity: 1;
  color: rgb(74 29 150 / var(--tw-text-opacity));
}

.hover\:text-pink-900:hover {
  --tw-text-opacity: 1;
  color: rgb(117 26 61 / var(--tw-text-opacity));
}

.hover\:text-gray-600:hover {
  --tw-text-opacity: 1;
  color: rgb(75 85 99 / var(--tw-text-opacity));
}

.hover\:text-blue-800:hover {
  --tw-text-opacity: 1;
  color: rgb(30 66 159 / var(--tw-text-opacity));
}

.hover\:text-gray-700:hover {
  --tw-text-opacity: 1;
  color: rgb(55 65 81 / var(--tw-text-opacity));
}

.hover\:text-gray-500:hover {
  --tw-text-opacity: 1;
  color: rgb(107 114 128 / var(--tw-text-opacity));
}

.hover\:underline:hover {
  text-decoration-line: underline;
}

.hover\:no-underline:hover {
  text-decoration-line: none;
}

.hover\:bg-blend-soft-light:hover {
  background-blend-mode: soft-light;
}

.hover\:shadow:hover {
  --tw-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
  --tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);
  box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
}

.hover\:blur-none:hover {
  --tw-blur: blur(0);
  filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow);
}

.hover\:grayscale-0:hover {
  --tw-grayscale: grayscale(0);
  filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow);
}

.focus\:z-10:focus {
  z-index: 10;
}

.focus\:border-blue-500:focus {
  --tw-border-opacity: 1;
  border-color: rgb(63 131 248 / var(--tw-border-opacity));
}

.focus\:border-blue-600:focus {
  --tw-border-opacity: 1;
  border-color: rgb(28 100 242 / var(--tw-border-opacity));
}

.focus\:border-green-500:focus {
  --tw-border-opacity: 1;
  border-color: rgb(14 159 110 / var(--tw-border-opacity));
}

.focus\:border-red-500:focus {
  --tw-border-opacity: 1;
  border-color: rgb(240 82 82 / var(--tw-border-opacity));
}

.focus\:border-green-600:focus {
  --tw-border-opacity: 1;
  border-color: rgb(5 122 85 / var(--tw-border-opacity));
}

.focus\:border-red-600:focus {
  --tw-border-opacity: 1;
  border-color: rgb(224 36 36 / var(--tw-border-opacity));
}

.focus\:border-gray-200:focus {
  --tw-border-opacity: 1;
  border-color: rgb(229 231 235 / var(--tw-border-opacity));
}

.focus\:bg-gray-100:focus {
  --tw-bg-opacity: 1;
  background-color: rgb(243 244 246 / var(--tw-bg-opacity));
}

.focus\:bg-gray-900:focus {
  --tw-bg-opacity: 1;
  background-color: rgb(17 24 39 / var(--tw-bg-opacity));
}

.focus\:text-blue-700:focus {
  --tw-text-opacity: 1;
  color: rgb(26 86 219 / var(--tw-text-opacity));
}

.focus\:text-white:focus {
  --tw-text-opacity: 1;
  color: rgb(255 255 255 / var(--tw-text-opacity));
}

.focus\:outline-none:focus {
  outline: 2px solid transparent;
  outline-offset: 2px;
}

.focus\:ring-4:focus {
  --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
  --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(4px + var(--tw-ring-offset-width)) var(--tw-ring-color);
  box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
}

.focus\:ring-2:focus {
  --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
  --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);
  box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
}

.focus\:ring-0:focus {
  --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
  --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(0px + var(--tw-ring-offset-width)) var(--tw-ring-color);
  box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
}

.focus\:ring-blue-500:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(63 131 248 / var(--tw-ring-opacity));
}

.focus\:ring-blue-300:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(164 202 254 / var(--tw-ring-opacity));
}

.focus\:ring-gray-100:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(243 244 246 / var(--tw-ring-opacity));
}

.focus\:ring-gray-200:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(229 231 235 / var(--tw-ring-opacity));
}

.focus\:ring-gray-300:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(209 213 219 / var(--tw-ring-opacity));
}

.focus\:ring-blue-200:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(195 221 253 / var(--tw-ring-opacity));
}

.focus\:ring-blue-400:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(118 169 250 / var(--tw-ring-opacity));
}

.focus\:ring-red-400:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(249 128 128 / var(--tw-ring-opacity));
}

.focus\:ring-green-400:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(49 196 141 / var(--tw-ring-opacity));
}

.focus\:ring-yellow-400:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(227 160 8 / var(--tw-ring-opacity));
}

.focus\:ring-gray-400:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(156 163 175 / var(--tw-ring-opacity));
}

.focus\:ring-red-300:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(248 180 180 / var(--tw-ring-opacity));
}

.focus\:ring-green-300:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(132 225 188 / var(--tw-ring-opacity));
}

.focus\:ring-yellow-300:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(250 202 21 / var(--tw-ring-opacity));
}

.focus\:ring-blue-700:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(26 86 219 / var(--tw-ring-opacity));
}

.focus\:ring-gray-500:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(107 114 128 / var(--tw-ring-opacity));
}

.focus\:ring-purple-300:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(202 191 253 / var(--tw-ring-opacity));
}

.focus\:ring-cyan-300:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(103 232 249 / var(--tw-ring-opacity));
}

.focus\:ring-teal-300:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(126 220 226 / var(--tw-ring-opacity));
}

.focus\:ring-lime-300:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(190 242 100 / var(--tw-ring-opacity));
}

.focus\:ring-pink-300:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(248 180 217 / var(--tw-ring-opacity));
}

.focus\:ring-green-200:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(188 240 218 / var(--tw-ring-opacity));
}

.focus\:ring-purple-200:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(220 215 254 / var(--tw-ring-opacity));
}

.focus\:ring-pink-200:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(250 209 232 / var(--tw-ring-opacity));
}

.focus\:ring-lime-200:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(217 249 157 / var(--tw-ring-opacity));
}

.focus\:ring-red-100:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(253 232 232 / var(--tw-ring-opacity));
}

.focus\:ring-cyan-200:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(165 243 252 / var(--tw-ring-opacity));
}

.focus\:ring-\[\#3b5998\]\/50:focus {
  --tw-ring-color: rgb(59 89 152 / 0.5);
}

.focus\:ring-\[\#1da1f2\]\/50:focus {
  --tw-ring-color: rgb(29 161 242 / 0.5);
}

.focus\:ring-\[\#24292F\]\/50:focus {
  --tw-ring-color: rgb(36 41 47 / 0.5);
}

.focus\:ring-\[\#4285F4\]\/50:focus {
  --tw-ring-color: rgb(66 133 244 / 0.5);
}

.focus\:ring-\[\#050708\]\/50:focus {
  --tw-ring-color: rgb(5 7 8 / 0.5);
}

.focus\:ring-\[\#FF9119\]\/50:focus {
  --tw-ring-color: rgb(255 145 25 / 0.5);
}

.focus\:ring-\[\#F7BE38\]\/50:focus {
  --tw-ring-color: rgb(247 190 56 / 0.5);
}

.focus\:ring-\[\#2557D6\]\/50:focus {
  --tw-ring-color: rgb(37 87 214 / 0.5);
}

.focus\:ring-gray-50:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(249 250 251 / var(--tw-ring-opacity));
}

.focus\:ring-green-500:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(14 159 110 / var(--tw-ring-opacity));
}

.focus\:ring-red-500:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(240 82 82 / var(--tw-ring-opacity));
}

.focus\:ring-gray-700:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(55 65 81 / var(--tw-ring-opacity));
}

.focus\:ring-blue-600:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(28 100 242 / var(--tw-ring-opacity));
}

.focus\:ring-purple-500:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(144 97 249 / var(--tw-ring-opacity));
}

.focus\:ring-teal-500:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(6 148 162 / var(--tw-ring-opacity));
}

.focus\:ring-yellow-500:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(194 120 3 / var(--tw-ring-opacity));
}

.focus\:ring-orange-500:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(255 90 31 / var(--tw-ring-opacity));
}

.group:hover .group-hover\:rotate-45 {
  --tw-rotate: 45deg;
  transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
}

.group:hover .group-hover\:bg-white\/50 {
  background-color: rgb(255 255 255 / 0.5);
}

.group:hover .group-hover\:bg-opacity-0 {
  --tw-bg-opacity: 0;
}

.group:hover .group-hover\:from-purple-600 {
  --tw-gradient-from: #7E3AF2;
  --tw-gradient-to: rgb(126 58 242 / 0);
  --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
}

.group:hover .group-hover\:from-cyan-500 {
  --tw-gradient-from: #06b6d4;
  --tw-gradient-to: rgb(6 182 212 / 0);
  --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
}

.group:hover .group-hover\:from-green-400 {
  --tw-gradient-from: #31C48D;
  --tw-gradient-to: rgb(49 196 141 / 0);
  --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
}

.group:hover .group-hover\:from-purple-500 {
  --tw-gradient-from: #9061F9;
  --tw-gradient-to: rgb(144 97 249 / 0);
  --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
}

.group:hover .group-hover\:from-pink-500 {
  --tw-gradient-from: #E74694;
  --tw-gradient-to: rgb(231 70 148 / 0);
  --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
}

.group:hover .group-hover\:from-teal-300 {
  --tw-gradient-from: #7EDCE2;
  --tw-gradient-to: rgb(126 220 226 / 0);
  --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
}

.group:hover .group-hover\:from-red-200 {
  --tw-gradient-from: #FBD5D5;
  --tw-gradient-to: rgb(251 213 213 / 0);
  --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
}

.group:hover .group-hover\:via-red-300 {
  --tw-gradient-to: rgb(248 180 180 / 0);
  --tw-gradient-stops: var(--tw-gradient-from), #F8B4B4, var(--tw-gradient-to);
}

.group:hover .group-hover\:to-blue-500 {
  --tw-gradient-to: #3F83F8;
}

.group:hover .group-hover\:to-blue-600 {
  --tw-gradient-to: #1C64F2;
}

.group:hover .group-hover\:to-pink-500 {
  --tw-gradient-to: #E74694;
}

.group:hover .group-hover\:to-orange-400 {
  --tw-gradient-to: #FF8A4C;
}

.group:hover .group-hover\:to-lime-300 {
  --tw-gradient-to: #bef264;
}

.group:hover .group-hover\:to-yellow-200 {
  --tw-gradient-to: #FCE96A;
}

.group:hover .group-hover\:text-blue-600 {
  --tw-text-opacity: 1;
  color: rgb(28 100 242 / var(--tw-text-opacity));
}

.group:hover .group-hover\:text-gray-900 {
  --tw-text-opacity: 1;
  color: rgb(17 24 39 / var(--tw-text-opacity));
}

.group:hover .group-hover\:text-gray-500 {
  --tw-text-opacity: 1;
  color: rgb(107 114 128 / var(--tw-text-opacity));
}

.group:hover .group-hover\:opacity-100 {
  opacity: 1;
}

.group:focus .group-focus\:outline-none {
  outline: 2px solid transparent;
  outline-offset: 2px;
}

.group:focus .group-focus\:ring-4 {
  --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
  --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(4px + var(--tw-ring-offset-width)) var(--tw-ring-color);
  box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
}

.group:focus .group-focus\:ring-white {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(255 255 255 / var(--tw-ring-opacity));
}

.peer:checked ~ .peer-checked\:border-blue-600 {
  --tw-border-opacity: 1;
  border-color: rgb(28 100 242 / var(--tw-border-opacity));
}

.peer:checked ~ .peer-checked\:bg-blue-600 {
  --tw-bg-opacity: 1;
  background-color: rgb(28 100 242 / var(--tw-bg-opacity));
}

.peer:checked ~ .peer-checked\:bg-red-600 {
  --tw-bg-opacity: 1;
  background-color: rgb(224 36 36 / var(--tw-bg-opacity));
}

.peer:checked ~ .peer-checked\:bg-green-600 {
  --tw-bg-opacity: 1;
  background-color: rgb(5 122 85 / var(--tw-bg-opacity));
}

.peer:checked ~ .peer-checked\:bg-purple-600 {
  --tw-bg-opacity: 1;
  background-color: rgb(126 58 242 / var(--tw-bg-opacity));
}

.peer:checked ~ .peer-checked\:bg-yellow-400 {
  --tw-bg-opacity: 1;
  background-color: rgb(227 160 8 / var(--tw-bg-opacity));
}

.peer:checked ~ .peer-checked\:bg-teal-600 {
  --tw-bg-opacity: 1;
  background-color: rgb(4 116 129 / var(--tw-bg-opacity));
}

.peer:checked ~ .peer-checked\:bg-orange-500 {
  --tw-bg-opacity: 1;
  background-color: rgb(255 90 31 / var(--tw-bg-opacity));
}

.peer:checked ~ .peer-checked\:text-gray-600 {
  --tw-text-opacity: 1;
  color: rgb(75 85 99 / var(--tw-text-opacity));
}

.peer:checked ~ .peer-checked\:text-blue-600 {
  --tw-text-opacity: 1;
  color: rgb(28 100 242 / var(--tw-text-opacity));
}

.peer:checked ~ .peer-checked\:after\:translate-x-full::after {
  content: var(--tw-content);
  --tw-translate-x: 100%;
  transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
}

.peer:checked ~ .peer-checked\:after\:border-white::after {
  content: var(--tw-content);
  --tw-border-opacity: 1;
  border-color: rgb(255 255 255 / var(--tw-border-opacity));
}

.peer:-moz-placeholder-shown ~ .peer-placeholder-shown\:top-1\/2 {
  top: 50%;
}

.peer:placeholder-shown ~ .peer-placeholder-shown\:top-1\/2 {
  top: 50%;
}

.peer:-moz-placeholder-shown ~ .peer-placeholder-shown\:translate-y-0 {
  --tw-translate-y: 0px;
  transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
}

.peer:placeholder-shown ~ .peer-placeholder-shown\:translate-y-0 {
  --tw-translate-y: 0px;
  transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
}

.peer:-moz-placeholder-shown ~ .peer-placeholder-shown\:-translate-y-1\/2 {
  --tw-translate-y: -50%;
  transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
}

.peer:placeholder-shown ~ .peer-placeholder-shown\:-translate-y-1\/2 {
  --tw-translate-y: -50%;
  transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
}

.peer:-moz-placeholder-shown ~ .peer-placeholder-shown\:scale-100 {
  --tw-scale-x: 1;
  --tw-scale-y: 1;
  transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
}

.peer:placeholder-shown ~ .peer-placeholder-shown\:scale-100 {
  --tw-scale-x: 1;
  --tw-scale-y: 1;
  transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
}

.peer:focus ~ .peer-focus\:left-0 {
  left: 0px;
}

.peer:focus ~ .peer-focus\:top-2 {
  top: 0.5rem;
}

.peer:focus ~ .peer-focus\:top-1 {
  top: 0.25rem;
}

.peer:focus ~ .peer-focus\:-translate-y-6 {
  --tw-translate-y: -1.5rem;
  transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
}

.peer:focus ~ .peer-focus\:-translate-y-4 {
  --tw-translate-y: -1rem;
  transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
}

.peer:focus ~ .peer-focus\:-translate-y-3 {
  --tw-translate-y: -0.75rem;
  transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
}

.peer:focus ~ .peer-focus\:scale-75 {
  --tw-scale-x: .75;
  --tw-scale-y: .75;
  transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
}

.peer:focus ~ .peer-focus\:px-2 {
  padding-left: 0.5rem;
  padding-right: 0.5rem;
}

.peer:focus ~ .peer-focus\:font-medium {
  font-weight: 500;
}

.peer:focus ~ .peer-focus\:text-blue-600 {
  --tw-text-opacity: 1;
  color: rgb(28 100 242 / var(--tw-text-opacity));
}

.peer:focus ~ .peer-focus\:outline-none {
  outline: 2px solid transparent;
  outline-offset: 2px;
}

.peer:focus ~ .peer-focus\:ring-4 {
  --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
  --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(4px + var(--tw-ring-offset-width)) var(--tw-ring-color);
  box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
}

.peer:focus ~ .peer-focus\:ring-blue-300 {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(164 202 254 / var(--tw-ring-opacity));
}

.peer:focus ~ .peer-focus\:ring-red-300 {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(248 180 180 / var(--tw-ring-opacity));
}

.peer:focus ~ .peer-focus\:ring-green-300 {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(132 225 188 / var(--tw-ring-opacity));
}

.peer:focus ~ .peer-focus\:ring-purple-300 {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(202 191 253 / var(--tw-ring-opacity));
}

.peer:focus ~ .peer-focus\:ring-yellow-300 {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(250 202 21 / var(--tw-ring-opacity));
}

.peer:focus ~ .peer-focus\:ring-teal-300 {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(126 220 226 / var(--tw-ring-opacity));
}

.peer:focus ~ .peer-focus\:ring-orange-300 {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(253 186 140 / var(--tw-ring-opacity));
}

.dark .dark\:block {
  display: block;
}

.dark .dark\:inline-block {
  display: inline-block;
}

.dark .dark\:hidden {
  display: none;
}

.dark .dark\:divide-gray-600 > :not([hidden]) ~ :not([hidden]) {
  --tw-divide-opacity: 1;
  border-color: rgb(75 85 99 / var(--tw-divide-opacity));
}

.dark .dark\:divide-gray-700 > :not([hidden]) ~ :not([hidden]) {
  --tw-divide-opacity: 1;
  border-color: rgb(55 65 81 / var(--tw-divide-opacity));
}

.dark .dark\:border-gray-800 {
  --tw-border-opacity: 1;
  border-color: rgb(31 41 55 / var(--tw-border-opacity));
}

.dark .dark\:border-gray-700 {
  --tw-border-opacity: 1;
  border-color: rgb(55 65 81 / var(--tw-border-opacity));
}

.dark .dark\:border-gray-600 {
  --tw-border-opacity: 1;
  border-color: rgb(75 85 99 / var(--tw-border-opacity));
}

.dark .dark\:border-blue-400 {
  --tw-border-opacity: 1;
  border-color: rgb(118 169 250 / var(--tw-border-opacity));
}

.dark .dark\:border-blue-800 {
  --tw-border-opacity: 1;
  border-color: rgb(30 66 159 / var(--tw-border-opacity));
}

.dark .dark\:border-red-800 {
  --tw-border-opacity: 1;
  border-color: rgb(155 28 28 / var(--tw-border-opacity));
}

.dark .dark\:border-green-800 {
  --tw-border-opacity: 1;
  border-color: rgb(3 84 63 / var(--tw-border-opacity));
}

.dark .dark\:border-yellow-800 {
  --tw-border-opacity: 1;
  border-color: rgb(114 59 19 / var(--tw-border-opacity));
}

.dark .dark\:border-blue-600 {
  --tw-border-opacity: 1;
  border-color: rgb(28 100 242 / var(--tw-border-opacity));
}

.dark .dark\:border-red-600 {
  --tw-border-opacity: 1;
  border-color: rgb(224 36 36 / var(--tw-border-opacity));
}

.dark .dark\:border-green-600 {
  --tw-border-opacity: 1;
  border-color: rgb(5 122 85 / var(--tw-border-opacity));
}

.dark .dark\:border-yellow-300 {
  --tw-border-opacity: 1;
  border-color: rgb(250 202 21 / var(--tw-border-opacity));
}

.dark .dark\:border-gray-900 {
  --tw-border-opacity: 1;
  border-color: rgb(17 24 39 / var(--tw-border-opacity));
}

.dark .dark\:border-gray-500 {
  --tw-border-opacity: 1;
  border-color: rgb(107 114 128 / var(--tw-border-opacity));
}

.dark .dark\:border-white {
  --tw-border-opacity: 1;
  border-color: rgb(255 255 255 / var(--tw-border-opacity));
}

.dark .dark\:border-blue-500 {
  --tw-border-opacity: 1;
  border-color: rgb(63 131 248 / var(--tw-border-opacity));
}

.dark .dark\:border-green-500 {
  --tw-border-opacity: 1;
  border-color: rgb(14 159 110 / var(--tw-border-opacity));
}

.dark .dark\:border-red-500 {
  --tw-border-opacity: 1;
  border-color: rgb(240 82 82 / var(--tw-border-opacity));
}

.dark .dark\:border-purple-400 {
  --tw-border-opacity: 1;
  border-color: rgb(172 148 250 / var(--tw-border-opacity));
}

.dark .dark\:border-green-400 {
  --tw-border-opacity: 1;
  border-color: rgb(49 196 141 / var(--tw-border-opacity));
}

.dark .dark\:border-red-400 {
  --tw-border-opacity: 1;
  border-color: rgb(249 128 128 / var(--tw-border-opacity));
}

.dark .dark\:border-gray-400 {
  --tw-border-opacity: 1;
  border-color: rgb(156 163 175 / var(--tw-border-opacity));
}

.dark .dark\:\!border-blue-500 {
  --tw-border-opacity: 1 !important;
  border-color: rgb(63 131 248 / var(--tw-border-opacity)) !important;
}

.dark .dark\:border-transparent {
  border-color: transparent;
}

.dark .dark\:border-l-gray-700 {
  --tw-border-opacity: 1;
  border-left-color: rgb(55 65 81 / var(--tw-border-opacity));
}

.dark .dark\:bg-gray-900 {
  --tw-bg-opacity: 1;
  background-color: rgb(17 24 39 / var(--tw-bg-opacity));
}

.dark .dark\:bg-gray-900\/60 {
  background-color: rgb(17 24 39 / 0.6);
}

.dark .dark\:bg-gray-800 {
  --tw-bg-opacity: 1;
  background-color: rgb(31 41 55 / var(--tw-bg-opacity));
}

.dark .dark\:bg-gray-700 {
  --tw-bg-opacity: 1;
  background-color: rgb(55 65 81 / var(--tw-bg-opacity));
}

.dark .dark\:bg-blue-600 {
  --tw-bg-opacity: 1;
  background-color: rgb(28 100 242 / var(--tw-bg-opacity));
}

.dark .dark\:bg-blue-200 {
  --tw-bg-opacity: 1;
  background-color: rgb(195 221 253 / var(--tw-bg-opacity));
}

.dark .dark\:bg-red-600 {
  --tw-bg-opacity: 1;
  background-color: rgb(224 36 36 / var(--tw-bg-opacity));
}

.dark .dark\:bg-green-600 {
  --tw-bg-opacity: 1;
  background-color: rgb(5 122 85 / var(--tw-bg-opacity));
}

.dark .dark\:bg-yellow-300 {
  --tw-bg-opacity: 1;
  background-color: rgb(250 202 21 / var(--tw-bg-opacity));
}

.dark .dark\:bg-gray-600 {
  --tw-bg-opacity: 1;
  background-color: rgb(75 85 99 / var(--tw-bg-opacity));
}

.dark .dark\:bg-blue-900 {
  --tw-bg-opacity: 1;
  background-color: rgb(35 56 118 / var(--tw-bg-opacity));
}

.dark .dark\:bg-red-900 {
  --tw-bg-opacity: 1;
  background-color: rgb(119 29 29 / var(--tw-bg-opacity));
}

.dark .dark\:bg-green-900 {
  --tw-bg-opacity: 1;
  background-color: rgb(1 71 55 / var(--tw-bg-opacity));
}

.dark .dark\:bg-yellow-900 {
  --tw-bg-opacity: 1;
  background-color: rgb(99 49 18 / var(--tw-bg-opacity));
}

.dark .dark\:bg-indigo-900 {
  --tw-bg-opacity: 1;
  background-color: rgb(54 47 120 / var(--tw-bg-opacity));
}

.dark .dark\:bg-purple-900 {
  --tw-bg-opacity: 1;
  background-color: rgb(74 29 150 / var(--tw-bg-opacity));
}

.dark .dark\:bg-pink-900 {
  --tw-bg-opacity: 1;
  background-color: rgb(117 26 61 / var(--tw-bg-opacity));
}

.dark .dark\:bg-gray-300 {
  --tw-bg-opacity: 1;
  background-color: rgb(209 213 219 / var(--tw-bg-opacity));
}

.dark .dark\:bg-purple-600 {
  --tw-bg-opacity: 1;
  background-color: rgb(126 58 242 / var(--tw-bg-opacity));
}

.dark .dark\:bg-white {
  --tw-bg-opacity: 1;
  background-color: rgb(255 255 255 / var(--tw-bg-opacity));
}

.dark .dark\:bg-blue-500 {
  --tw-bg-opacity: 1;
  background-color: rgb(63 131 248 / var(--tw-bg-opacity));
}

.dark .dark\:bg-gray-800\/30 {
  background-color: rgb(31 41 55 / 0.3);
}

.dark .dark\:bg-gray-800\/50 {
  background-color: rgb(31 41 55 / 0.5);
}

.dark .dark\:bg-gray-500 {
  --tw-bg-opacity: 1;
  background-color: rgb(107 114 128 / var(--tw-bg-opacity));
}

.dark .dark\:bg-green-100 {
  --tw-bg-opacity: 1;
  background-color: rgb(222 247 236 / var(--tw-bg-opacity));
}

.dark .dark\:bg-red-100 {
  --tw-bg-opacity: 1;
  background-color: rgb(253 232 232 / var(--tw-bg-opacity));
}

.dark .dark\:bg-blue-400 {
  --tw-bg-opacity: 1;
  background-color: rgb(118 169 250 / var(--tw-bg-opacity));
}

.dark .dark\:bg-orange-400 {
  --tw-bg-opacity: 1;
  background-color: rgb(255 138 76 / var(--tw-bg-opacity));
}

.dark .dark\:bg-red-500 {
  --tw-bg-opacity: 1;
  background-color: rgb(240 82 82 / var(--tw-bg-opacity));
}

.dark .dark\:bg-green-500 {
  --tw-bg-opacity: 1;
  background-color: rgb(14 159 110 / var(--tw-bg-opacity));
}

.dark .dark\:bg-indigo-500 {
  --tw-bg-opacity: 1;
  background-color: rgb(104 117 245 / var(--tw-bg-opacity));
}

.dark .dark\:bg-purple-500 {
  --tw-bg-opacity: 1;
  background-color: rgb(144 97 249 / var(--tw-bg-opacity));
}

.dark .dark\:bg-gray-400 {
  --tw-bg-opacity: 1;
  background-color: rgb(156 163 175 / var(--tw-bg-opacity));
}

.dark .dark\:bg-orange-200 {
  --tw-bg-opacity: 1;
  background-color: rgb(252 217 189 / var(--tw-bg-opacity));
}

.dark .dark\:bg-blue-800 {
  --tw-bg-opacity: 1;
  background-color: rgb(30 66 159 / var(--tw-bg-opacity));
}

.dark .dark\:bg-green-800 {
  --tw-bg-opacity: 1;
  background-color: rgb(3 84 63 / var(--tw-bg-opacity));
}

.dark .dark\:bg-red-800 {
  --tw-bg-opacity: 1;
  background-color: rgb(155 28 28 / var(--tw-bg-opacity));
}

.dark .dark\:bg-orange-700 {
  --tw-bg-opacity: 1;
  background-color: rgb(180 52 3 / var(--tw-bg-opacity));
}

.dark .dark\:bg-opacity-80 {
  --tw-bg-opacity: 0.8;
}

.dark .dark\:fill-gray-300 {
  fill: #D1D5DB;
}

.dark .dark\:text-white {
  --tw-text-opacity: 1;
  color: rgb(255 255 255 / var(--tw-text-opacity));
}

.dark .dark\:text-gray-400 {
  --tw-text-opacity: 1;
  color: rgb(156 163 175 / var(--tw-text-opacity));
}

.dark .dark\:text-gray-300 {
  --tw-text-opacity: 1;
  color: rgb(209 213 219 / var(--tw-text-opacity));
}

.dark .dark\:text-blue-500 {
  --tw-text-opacity: 1;
  color: rgb(63 131 248 / var(--tw-text-opacity));
}

.dark .dark\:text-green-600 {
  --tw-text-opacity: 1;
  color: rgb(5 122 85 / var(--tw-text-opacity));
}

.dark .dark\:text-blue-800 {
  --tw-text-opacity: 1;
  color: rgb(30 66 159 / var(--tw-text-opacity));
}

.dark .dark\:text-blue-400 {
  --tw-text-opacity: 1;
  color: rgb(118 169 250 / var(--tw-text-opacity));
}

.dark .dark\:text-gray-600 {
  --tw-text-opacity: 1;
  color: rgb(75 85 99 / var(--tw-text-opacity));
}

.dark .dark\:text-red-400 {
  --tw-text-opacity: 1;
  color: rgb(249 128 128 / var(--tw-text-opacity));
}

.dark .dark\:text-green-400 {
  --tw-text-opacity: 1;
  color: rgb(49 196 141 / var(--tw-text-opacity));
}

.dark .dark\:text-yellow-300 {
  --tw-text-opacity: 1;
  color: rgb(250 202 21 / var(--tw-text-opacity));
}

.dark .dark\:text-red-500 {
  --tw-text-opacity: 1;
  color: rgb(240 82 82 / var(--tw-text-opacity));
}

.dark .dark\:text-gray-800 {
  --tw-text-opacity: 1;
  color: rgb(31 41 55 / var(--tw-text-opacity));
}

.dark .dark\:text-purple-400 {
  --tw-text-opacity: 1;
  color: rgb(172 148 250 / var(--tw-text-opacity));
}

.dark .dark\:text-gray-200 {
  --tw-text-opacity: 1;
  color: rgb(229 231 235 / var(--tw-text-opacity));
}

.dark .dark\:text-blue-300 {
  --tw-text-opacity: 1;
  color: rgb(164 202 254 / var(--tw-text-opacity));
}

.dark .dark\:text-red-300 {
  --tw-text-opacity: 1;
  color: rgb(248 180 180 / var(--tw-text-opacity));
}

.dark .dark\:text-green-300 {
  --tw-text-opacity: 1;
  color: rgb(132 225 188 / var(--tw-text-opacity));
}

.dark .dark\:text-indigo-300 {
  --tw-text-opacity: 1;
  color: rgb(180 198 252 / var(--tw-text-opacity));
}

.dark .dark\:text-purple-300 {
  --tw-text-opacity: 1;
  color: rgb(202 191 253 / var(--tw-text-opacity));
}

.dark .dark\:text-pink-300 {
  --tw-text-opacity: 1;
  color: rgb(248 180 217 / var(--tw-text-opacity));
}

.dark .dark\:text-indigo-400 {
  --tw-text-opacity: 1;
  color: rgb(141 162 251 / var(--tw-text-opacity));
}

.dark .dark\:text-pink-400 {
  --tw-text-opacity: 1;
  color: rgb(241 126 184 / var(--tw-text-opacity));
}

.dark .dark\:text-gray-900 {
  --tw-text-opacity: 1;
  color: rgb(17 24 39 / var(--tw-text-opacity));
}

.dark .dark\:text-green-500 {
  --tw-text-opacity: 1;
  color: rgb(14 159 110 / var(--tw-text-opacity));
}

.dark .dark\:text-gray-500 {
  --tw-text-opacity: 1;
  color: rgb(107 114 128 / var(--tw-text-opacity));
}

.dark .dark\:text-gray-700 {
  --tw-text-opacity: 1;
  color: rgb(55 65 81 / var(--tw-text-opacity));
}

.dark .dark\:text-blue-200 {
  --tw-text-opacity: 1;
  color: rgb(195 221 253 / var(--tw-text-opacity));
}

.dark .dark\:text-gray-100 {
  --tw-text-opacity: 1;
  color: rgb(243 244 246 / var(--tw-text-opacity));
}

.dark .dark\:text-yellow-500 {
  --tw-text-opacity: 1;
  color: rgb(194 120 3 / var(--tw-text-opacity));
}

.dark .dark\:text-indigo-500 {
  --tw-text-opacity: 1;
  color: rgb(104 117 245 / var(--tw-text-opacity));
}

.dark .dark\:text-purple-500 {
  --tw-text-opacity: 1;
  color: rgb(144 97 249 / var(--tw-text-opacity));
}

.dark .dark\:text-orange-900 {
  --tw-text-opacity: 1;
  color: rgb(119 29 29 / var(--tw-text-opacity));
}

.dark .dark\:text-blue-100 {
  --tw-text-opacity: 1;
  color: rgb(225 239 254 / var(--tw-text-opacity));
}

.dark .dark\:text-green-200 {
  --tw-text-opacity: 1;
  color: rgb(188 240 218 / var(--tw-text-opacity));
}

.dark .dark\:text-red-200 {
  --tw-text-opacity: 1;
  color: rgb(251 213 213 / var(--tw-text-opacity));
}

.dark .dark\:text-orange-200 {
  --tw-text-opacity: 1;
  color: rgb(252 217 189 / var(--tw-text-opacity));
}

.dark .dark\:text-blue-500\/100 {
  color: rgb(63 131 248 / 1);
}

.dark .dark\:text-blue-500\/75 {
  color: rgb(63 131 248 / 0.75);
}

.dark .dark\:text-blue-500\/50 {
  color: rgb(63 131 248 / 0.5);
}

.dark .dark\:text-blue-500\/25 {
  color: rgb(63 131 248 / 0.25);
}

.dark .dark\:\!text-blue-500 {
  --tw-text-opacity: 1 !important;
  color: rgb(63 131 248 / var(--tw-text-opacity)) !important;
}

.dark .dark\:decoration-blue-600 {
  text-decoration-color: #1C64F2;
}

.dark .dark\:placeholder-gray-400::-moz-placeholder {
  --tw-placeholder-opacity: 1;
  color: rgb(156 163 175 / var(--tw-placeholder-opacity));
}

.dark .dark\:placeholder-gray-400::placeholder {
  --tw-placeholder-opacity: 1;
  color: rgb(156 163 175 / var(--tw-placeholder-opacity));
}

.dark .dark\:placeholder-green-500::-moz-placeholder {
  --tw-placeholder-opacity: 1;
  color: rgb(14 159 110 / var(--tw-placeholder-opacity));
}

.dark .dark\:placeholder-green-500::placeholder {
  --tw-placeholder-opacity: 1;
  color: rgb(14 159 110 / var(--tw-placeholder-opacity));
}

.dark .dark\:placeholder-red-500::-moz-placeholder {
  --tw-placeholder-opacity: 1;
  color: rgb(240 82 82 / var(--tw-placeholder-opacity));
}

.dark .dark\:placeholder-red-500::placeholder {
  --tw-placeholder-opacity: 1;
  color: rgb(240 82 82 / var(--tw-placeholder-opacity));
}

.dark .dark\:shadow-lg {
  --tw-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
  --tw-shadow-colored: 0 10px 15px -3px var(--tw-shadow-color), 0 4px 6px -4px var(--tw-shadow-color);
  box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
}

.dark .dark\:shadow-sm-light {
  --tw-shadow: 0 2px 5px 0px rgba(255, 255, 255, 0.08);
  --tw-shadow-colored: 0 2px 5px 0px var(--tw-shadow-color);
  box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
}

.dark .dark\:shadow-blue-800\/80 {
  --tw-shadow-color: rgb(30 66 159 / 0.8);
  --tw-shadow: var(--tw-shadow-colored);
}

.dark .dark\:shadow-green-800\/80 {
  --tw-shadow-color: rgb(3 84 63 / 0.8);
  --tw-shadow: var(--tw-shadow-colored);
}

.dark .dark\:shadow-cyan-800\/80 {
  --tw-shadow-color: rgb(21 94 117 / 0.8);
  --tw-shadow: var(--tw-shadow-colored);
}

.dark .dark\:shadow-teal-800\/80 {
  --tw-shadow-color: rgb(5 80 92 / 0.8);
  --tw-shadow: var(--tw-shadow-colored);
}

.dark .dark\:shadow-lime-800\/80 {
  --tw-shadow-color: rgb(63 98 18 / 0.8);
  --tw-shadow: var(--tw-shadow-colored);
}

.dark .dark\:shadow-red-800\/80 {
  --tw-shadow-color: rgb(155 28 28 / 0.8);
  --tw-shadow: var(--tw-shadow-colored);
}

.dark .dark\:shadow-pink-800\/80 {
  --tw-shadow-color: rgb(153 21 75 / 0.8);
  --tw-shadow: var(--tw-shadow-colored);
}

.dark .dark\:shadow-purple-800\/80 {
  --tw-shadow-color: rgb(85 33 181 / 0.8);
  --tw-shadow: var(--tw-shadow-colored);
}

.dark .dark\:shadow-gray-800 {
  --tw-shadow-color: #1F2937;
  --tw-shadow: var(--tw-shadow-colored);
}

.dark .dark\:ring-gray-500 {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(107 114 128 / var(--tw-ring-opacity));
}

.dark .dark\:ring-gray-900 {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(17 24 39 / var(--tw-ring-opacity));
}

.dark .dark\:ring-offset-gray-800 {
  --tw-ring-offset-color: #1F2937;
}

.dark .dark\:ring-offset-gray-700 {
  --tw-ring-offset-color: #374151;
}

.dark .dark\:first-letter\:text-gray-100::first-letter {
  --tw-text-opacity: 1;
  color: rgb(243 244 246 / var(--tw-text-opacity));
}

.dark .dark\:after\:border-gray-700::after {
  content: var(--tw-content);
  --tw-border-opacity: 1;
  border-color: rgb(55 65 81 / var(--tw-border-opacity));
}

.dark .dark\:after\:border-blue-800::after {
  content: var(--tw-content);
  --tw-border-opacity: 1;
  border-color: rgb(30 66 159 / var(--tw-border-opacity));
}

.dark .dark\:after\:text-gray-500::after {
  content: var(--tw-content);
  --tw-text-opacity: 1;
  color: rgb(107 114 128 / var(--tw-text-opacity));
}

.dark .dark\:hover\:border-gray-600:hover {
  --tw-border-opacity: 1;
  border-color: rgb(75 85 99 / var(--tw-border-opacity));
}

.dark .dark\:hover\:border-gray-700:hover {
  --tw-border-opacity: 1;
  border-color: rgb(55 65 81 / var(--tw-border-opacity));
}

.dark .dark\:hover\:border-gray-500:hover {
  --tw-border-opacity: 1;
  border-color: rgb(107 114 128 / var(--tw-border-opacity));
}

.dark .dark\:hover\:bg-gray-700:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(55 65 81 / var(--tw-bg-opacity));
}

.dark .dark\:hover\:bg-blue-700:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(26 86 219 / var(--tw-bg-opacity));
}

.dark .dark\:hover\:bg-gray-800:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(31 41 55 / var(--tw-bg-opacity));
}

.dark .dark\:hover\:bg-blue-600:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(28 100 242 / var(--tw-bg-opacity));
}

.dark .dark\:hover\:bg-red-700:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(200 30 30 / var(--tw-bg-opacity));
}

.dark .dark\:hover\:bg-red-600:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(224 36 36 / var(--tw-bg-opacity));
}

.dark .dark\:hover\:bg-green-700:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(4 108 78 / var(--tw-bg-opacity));
}

.dark .dark\:hover\:bg-green-600:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(5 122 85 / var(--tw-bg-opacity));
}

.dark .dark\:hover\:bg-yellow-400:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(227 160 8 / var(--tw-bg-opacity));
}

.dark .dark\:hover\:bg-yellow-300:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(250 202 21 / var(--tw-bg-opacity));
}

.dark .dark\:hover\:bg-gray-500:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(107 114 128 / var(--tw-bg-opacity));
}

.dark .dark\:hover\:bg-gray-600:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(75 85 99 / var(--tw-bg-opacity));
}

.dark .dark\:hover\:bg-blue-800:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(30 66 159 / var(--tw-bg-opacity));
}

.dark .dark\:hover\:bg-red-800:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(155 28 28 / var(--tw-bg-opacity));
}

.dark .dark\:hover\:bg-green-800:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(3 84 63 / var(--tw-bg-opacity));
}

.dark .dark\:hover\:bg-yellow-800:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(114 59 19 / var(--tw-bg-opacity));
}

.dark .dark\:hover\:bg-indigo-800:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(66 56 157 / var(--tw-bg-opacity));
}

.dark .dark\:hover\:bg-purple-800:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(85 33 181 / var(--tw-bg-opacity));
}

.dark .dark\:hover\:bg-pink-800:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(153 21 75 / var(--tw-bg-opacity));
}

.dark .dark\:hover\:bg-purple-700:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(108 43 217 / var(--tw-bg-opacity));
}

.dark .dark\:hover\:bg-\[\#050708\]\/30:hover {
  background-color: rgb(5 7 8 / 0.3);
}

.dark .dark\:hover\:bg-\[\#FF9119\]\/80:hover {
  background-color: rgb(255 145 25 / 0.8);
}

.dark .dark\:hover\:bg-\[\#050708\]\/40:hover {
  background-color: rgb(5 7 8 / 0.4);
}

.dark .dark\:hover\:bg-gray-200:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(229 231 235 / var(--tw-bg-opacity));
}

.dark .dark\:hover\:bg-purple-500:hover {
  --tw-bg-opacity: 1;
  background-color: rgb(144 97 249 / var(--tw-bg-opacity));
}

.dark .dark\:hover\:text-white:hover {
  --tw-text-opacity: 1;
  color: rgb(255 255 255 / var(--tw-text-opacity));
}

.dark .dark\:hover\:text-blue-500:hover {
  --tw-text-opacity: 1;
  color: rgb(63 131 248 / var(--tw-text-opacity));
}

.dark .dark\:hover\:text-gray-800:hover {
  --tw-text-opacity: 1;
  color: rgb(31 41 55 / var(--tw-text-opacity));
}

.dark .dark\:hover\:text-blue-300:hover {
  --tw-text-opacity: 1;
  color: rgb(164 202 254 / var(--tw-text-opacity));
}

.dark .dark\:hover\:text-gray-300:hover {
  --tw-text-opacity: 1;
  color: rgb(209 213 219 / var(--tw-text-opacity));
}

.dark .dark\:hover\:text-red-300:hover {
  --tw-text-opacity: 1;
  color: rgb(248 180 180 / var(--tw-text-opacity));
}

.dark .dark\:hover\:text-green-300:hover {
  --tw-text-opacity: 1;
  color: rgb(132 225 188 / var(--tw-text-opacity));
}

.dark .dark\:hover\:text-yellow-300:hover {
  --tw-text-opacity: 1;
  color: rgb(250 202 21 / var(--tw-text-opacity));
}

.dark .dark\:hover\:text-indigo-300:hover {
  --tw-text-opacity: 1;
  color: rgb(180 198 252 / var(--tw-text-opacity));
}

.dark .dark\:hover\:text-purple-300:hover {
  --tw-text-opacity: 1;
  color: rgb(202 191 253 / var(--tw-text-opacity));
}

.dark .dark\:hover\:text-pink-300:hover {
  --tw-text-opacity: 1;
  color: rgb(248 180 217 / var(--tw-text-opacity));
}

.dark .dark\:hover\:text-gray-900:hover {
  --tw-text-opacity: 1;
  color: rgb(17 24 39 / var(--tw-text-opacity));
}

.dark .dark\:hover\:text-blue-700:hover {
  --tw-text-opacity: 1;
  color: rgb(26 86 219 / var(--tw-text-opacity));
}

.dark .dark\:hover\:text-blue-600:hover {
  --tw-text-opacity: 1;
  color: rgb(28 100 242 / var(--tw-text-opacity));
}

.dark .dark\:hover\:text-blue-400:hover {
  --tw-text-opacity: 1;
  color: rgb(118 169 250 / var(--tw-text-opacity));
}

.dark .dark\:hover\:text-gray-400:hover {
  --tw-text-opacity: 1;
  color: rgb(156 163 175 / var(--tw-text-opacity));
}

.dark .dark\:hover\:bg-blend-darken:hover {
  background-blend-mode: darken;
}

.dark .dark\:focus\:border-blue-500:focus {
  --tw-border-opacity: 1;
  border-color: rgb(63 131 248 / var(--tw-border-opacity));
}

.dark .dark\:focus\:border-green-500:focus {
  --tw-border-opacity: 1;
  border-color: rgb(14 159 110 / var(--tw-border-opacity));
}

.dark .dark\:focus\:border-red-500:focus {
  --tw-border-opacity: 1;
  border-color: rgb(240 82 82 / var(--tw-border-opacity));
}

.dark .dark\:focus\:bg-gray-700:focus {
  --tw-bg-opacity: 1;
  background-color: rgb(55 65 81 / var(--tw-bg-opacity));
}

.dark .dark\:focus\:bg-blue-600:focus {
  --tw-bg-opacity: 1;
  background-color: rgb(28 100 242 / var(--tw-bg-opacity));
}

.dark .dark\:focus\:text-white:focus {
  --tw-text-opacity: 1;
  color: rgb(255 255 255 / var(--tw-text-opacity));
}

.dark .dark\:focus\:ring-blue-500:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(63 131 248 / var(--tw-ring-opacity));
}

.dark .dark\:focus\:ring-blue-800:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(30 66 159 / var(--tw-ring-opacity));
}

.dark .dark\:focus\:ring-gray-700:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(55 65 81 / var(--tw-ring-opacity));
}

.dark .dark\:focus\:ring-gray-500:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(107 114 128 / var(--tw-ring-opacity));
}

.dark .dark\:focus\:ring-gray-800:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(31 41 55 / var(--tw-ring-opacity));
}

.dark .dark\:focus\:ring-red-800:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(155 28 28 / var(--tw-ring-opacity));
}

.dark .dark\:focus\:ring-green-800:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(3 84 63 / var(--tw-ring-opacity));
}

.dark .dark\:focus\:ring-yellow-800:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(114 59 19 / var(--tw-ring-opacity));
}

.dark .dark\:focus\:ring-gray-600:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(75 85 99 / var(--tw-ring-opacity));
}

.dark .dark\:focus\:ring-red-900:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(119 29 29 / var(--tw-ring-opacity));
}

.dark .dark\:focus\:ring-yellow-900:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(99 49 18 / var(--tw-ring-opacity));
}

.dark .dark\:focus\:ring-purple-900:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(74 29 150 / var(--tw-ring-opacity));
}

.dark .dark\:focus\:ring-cyan-800:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(21 94 117 / var(--tw-ring-opacity));
}

.dark .dark\:focus\:ring-teal-800:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(5 80 92 / var(--tw-ring-opacity));
}

.dark .dark\:focus\:ring-lime-800:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(63 98 18 / var(--tw-ring-opacity));
}

.dark .dark\:focus\:ring-pink-800:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(153 21 75 / var(--tw-ring-opacity));
}

.dark .dark\:focus\:ring-purple-800:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(85 33 181 / var(--tw-ring-opacity));
}

.dark .dark\:focus\:ring-teal-700:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(3 102 114 / var(--tw-ring-opacity));
}

.dark .dark\:focus\:ring-red-400:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(249 128 128 / var(--tw-ring-opacity));
}

.dark .dark\:focus\:ring-\[\#050708\]\/50:focus {
  --tw-ring-color: rgb(5 7 8 / 0.5);
}

.dark .dark\:focus\:ring-\[\#FF9119\]\/40:focus {
  --tw-ring-color: rgb(255 145 25 / 0.4);
}

.dark .dark\:focus\:ring-\[\#F7BE38\]\/50:focus {
  --tw-ring-color: rgb(247 190 56 / 0.5);
}

.dark .dark\:focus\:ring-\[\#2557D6\]\/50:focus {
  --tw-ring-color: rgb(37 87 214 / 0.5);
}

.dark .dark\:focus\:ring-blue-600:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(28 100 242 / var(--tw-ring-opacity));
}

.dark .dark\:focus\:ring-blue-900:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(35 56 118 / var(--tw-ring-opacity));
}

.dark .dark\:focus\:ring-gray-400:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(156 163 175 / var(--tw-ring-opacity));
}

.dark .dark\:focus\:ring-red-600:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(224 36 36 / var(--tw-ring-opacity));
}

.dark .dark\:focus\:ring-green-600:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(5 122 85 / var(--tw-ring-opacity));
}

.dark .dark\:focus\:ring-purple-600:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(126 58 242 / var(--tw-ring-opacity));
}

.dark .dark\:focus\:ring-teal-600:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(4 116 129 / var(--tw-ring-opacity));
}

.dark .dark\:focus\:ring-yellow-600:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(159 88 10 / var(--tw-ring-opacity));
}

.dark .dark\:focus\:ring-orange-600:focus {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(208 56 1 / var(--tw-ring-opacity));
}

.dark .dark\:focus\:ring-offset-gray-800:focus {
  --tw-ring-offset-color: #1F2937;
}

.dark .dark\:focus\:ring-offset-gray-700:focus {
  --tw-ring-offset-color: #374151;
}

.dark .group:hover .dark\:group-hover\:bg-gray-800\/60 {
  background-color: rgb(31 41 55 / 0.6);
}

.dark .group:hover .dark\:group-hover\:text-blue-500 {
  --tw-text-opacity: 1;
  color: rgb(63 131 248 / var(--tw-text-opacity));
}

.dark .group:hover .dark\:group-hover\:text-white {
  --tw-text-opacity: 1;
  color: rgb(255 255 255 / var(--tw-text-opacity));
}

.dark .group:hover .dark\:group-hover\:text-gray-300 {
  --tw-text-opacity: 1;
  color: rgb(209 213 219 / var(--tw-text-opacity));
}

.dark .group:focus .dark\:group-focus\:ring-gray-800\/70 {
  --tw-ring-color: rgb(31 41 55 / 0.7);
}

.dark .peer:checked ~ .dark\:peer-checked\:text-gray-300 {
  --tw-text-opacity: 1;
  color: rgb(209 213 219 / var(--tw-text-opacity));
}

.dark .peer:checked ~ .dark\:peer-checked\:text-blue-500 {
  --tw-text-opacity: 1;
  color: rgb(63 131 248 / var(--tw-text-opacity));
}

.peer:focus ~ .dark .peer-focus\:dark\:text-blue-500 {
  --tw-text-opacity: 1;
  color: rgb(63 131 248 / var(--tw-text-opacity));
}

.dark .peer:focus ~ .dark\:peer-focus\:ring-blue-800 {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(30 66 159 / var(--tw-ring-opacity));
}

.dark .peer:focus ~ .dark\:peer-focus\:ring-red-800 {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(155 28 28 / var(--tw-ring-opacity));
}

.dark .peer:focus ~ .dark\:peer-focus\:ring-green-800 {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(3 84 63 / var(--tw-ring-opacity));
}

.dark .peer:focus ~ .dark\:peer-focus\:ring-purple-800 {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(85 33 181 / var(--tw-ring-opacity));
}

.dark .peer:focus ~ .dark\:peer-focus\:ring-yellow-800 {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(114 59 19 / var(--tw-ring-opacity));
}

.dark .peer:focus ~ .dark\:peer-focus\:ring-teal-800 {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(5 80 92 / var(--tw-ring-opacity));
}

.dark .peer:focus ~ .dark\:peer-focus\:ring-orange-800 {
  --tw-ring-opacity: 1;
  --tw-ring-color: rgb(138 44 13 / var(--tw-ring-opacity));
}

@media (min-width: 640px) {

  .sm\:order-last {
    order: 9999;
  }

  .sm\:col-span-1 {
    grid-column: span 1 / span 1;
  }

  .sm\:col-span-3 {
    grid-column: span 3 / span 3;
  }

  .sm\:mx-auto {
    margin-left: auto;
    margin-right: auto;
  }

  .sm\:mb-0 {
    margin-bottom: 0px;
  }

  .sm\:mt-0 {
    margin-top: 0px;
  }

  .sm\:mb-4 {
    margin-bottom: 1rem;
  }

  .sm\:ml-64 {
    margin-left: 16rem;
  }

  .sm\:ml-2 {
    margin-left: 0.5rem;
  }

  .sm\:ml-4 {
    margin-left: 1rem;
  }

  .sm\:mb-5 {
    margin-bottom: 1.25rem;
  }

  .sm\:ml-auto {
    margin-left: auto;
  }

  .sm\:block {
    display: block;
  }

  .sm\:inline-block {
    display: inline-block;
  }

  .sm\:flex {
    display: flex;
  }

  .sm\:inline-flex {
    display: inline-flex;
  }

  .sm\:grid {
    display: grid;
  }

  .sm\:hidden {
    display: none;
  }

  .sm\:h-10 {
    height: 2.5rem;
  }

  .sm\:h-6 {
    height: 1.5rem;
  }

  .sm\:h-64 {
    height: 16rem;
  }

  .sm\:h-9 {
    height: 2.25rem;
  }

  .sm\:h-7 {
    height: 1.75rem;
  }

  .sm\:h-5 {
    height: 1.25rem;
  }

  .sm\:w-auto {
    width: auto;
  }

  .sm\:w-10 {
    width: 2.5rem;
  }

  .sm\:w-6 {
    width: 1.5rem;
  }

  .sm\:w-96 {
    width: 24rem;
  }

  .sm\:w-5 {
    width: 1.25rem;
  }

  .sm\:translate-x-0 {
    --tw-translate-x: 0px;
    transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
  }

  .sm\:grid-cols-3 {
    grid-template-columns: repeat(3, minmax(0, 1fr));
  }

  .sm\:grid-cols-2 {
    grid-template-columns: repeat(2, minmax(0, 1fr));
  }

  .sm\:flex-row {
    flex-direction: row;
  }

  .sm\:items-center {
    align-items: center;
  }

  .sm\:justify-center {
    justify-content: center;
  }

  .sm\:justify-between {
    justify-content: space-between;
  }

  .sm\:gap-6 {
    gap: 1.5rem;
  }

  .sm\:space-y-0 > :not([hidden]) ~ :not([hidden]) {
    --tw-space-y-reverse: 0;
    margin-top: calc(0px * calc(1 - var(--tw-space-y-reverse)));
    margin-bottom: calc(0px * var(--tw-space-y-reverse));
  }

  .sm\:space-x-4 > :not([hidden]) ~ :not([hidden]) {
    --tw-space-x-reverse: 0;
    margin-right: calc(1rem * var(--tw-space-x-reverse));
    margin-left: calc(1rem * calc(1 - var(--tw-space-x-reverse)));
  }

  .sm\:space-x-8 > :not([hidden]) ~ :not([hidden]) {
    --tw-space-x-reverse: 0;
    margin-right: calc(2rem * var(--tw-space-x-reverse));
    margin-left: calc(2rem * calc(1 - var(--tw-space-x-reverse)));
  }

  .sm\:divide-x > :not([hidden]) ~ :not([hidden]) {
    --tw-divide-x-reverse: 0;
    border-right-width: calc(1px * var(--tw-divide-x-reverse));
    border-left-width: calc(1px * calc(1 - var(--tw-divide-x-reverse)));
  }

  .sm\:rounded-lg {
    border-radius: 0.5rem;
  }

  .sm\:border-b-0 {
    border-bottom-width: 0px;
  }

  .sm\:border-r {
    border-right-width: 1px;
  }

  .sm\:p-6 {
    padding: 1.5rem;
  }

  .sm\:p-8 {
    padding: 2rem;
  }

  .sm\:p-4 {
    padding: 1rem;
  }

  .sm\:px-5 {
    padding-left: 1.25rem;
    padding-right: 1.25rem;
  }

  .sm\:py-4 {
    padding-top: 1rem;
    padding-bottom: 1rem;
  }

  .sm\:px-4 {
    padding-left: 1rem;
    padding-right: 1rem;
  }

  .sm\:px-16 {
    padding-left: 4rem;
    padding-right: 4rem;
  }

  .sm\:py-16 {
    padding-top: 4rem;
    padding-bottom: 4rem;
  }

  .sm\:pt-4 {
    padding-top: 1rem;
  }

  .sm\:pr-8 {
    padding-right: 2rem;
  }

  .sm\:pr-4 {
    padding-right: 1rem;
  }

  .sm\:pl-4 {
    padding-left: 1rem;
  }

  .sm\:pl-2 {
    padding-left: 0.5rem;
  }

  .sm\:pb-4 {
    padding-bottom: 1rem;
  }

  .sm\:text-center {
    text-align: center;
  }

  .sm\:text-lg {
    font-size: 1.125rem;
    line-height: 1.75rem;
  }

  .sm\:text-xs {
    font-size: 0.75rem;
    line-height: 1rem;
  }

  .sm\:text-2xl {
    font-size: 1.5rem;
    line-height: 2rem;
  }

  .sm\:text-base {
    font-size: 1rem;
    line-height: 1.5rem;
  }

  .sm\:text-xl {
    font-size: 1.25rem;
    line-height: 1.75rem;
  }

  .sm\:ring-8 {
    --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
    --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(8px + var(--tw-ring-offset-width)) var(--tw-ring-color);
    box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
  }

  .sm\:after\:inline-block::after {
    content: var(--tw-content);
    display: inline-block;
  }

  .sm\:after\:hidden::after {
    content: var(--tw-content);
    display: none;
  }

  .sm\:after\:content-\[\'\'\]::after {
    --tw-content: '';
    content: var(--tw-content);
  }
}

@media (min-width: 768px) {

  .md\:relative {
    position: relative;
  }

  .md\:inset-0 {
    top: 0px;
    right: 0px;
    bottom: 0px;
    left: 0px;
  }

  .md\:top-auto {
    top: auto;
  }

  .md\:right-auto {
    right: auto;
  }

  .md\:order-2 {
    order: 2;
  }

  .md\:order-1 {
    order: 1;
  }

  .md\:m-0 {
    margin: 0px;
  }

  .md\:my-0 {
    margin-top: 0px;
    margin-bottom: 0px;
  }

  .md\:mx-2 {
    margin-left: 0.5rem;
    margin-right: 0.5rem;
  }

  .md\:my-10 {
    margin-top: 2.5rem;
    margin-bottom: 2.5rem;
  }

  .md\:my-12 {
    margin-top: 3rem;
    margin-bottom: 3rem;
  }

  .md\:ml-2 {
    margin-left: 0.5rem;
  }

  .md\:ml-1 {
    margin-left: 0.25rem;
  }

  .md\:mb-0 {
    margin-bottom: 0px;
  }

  .md\:mr-4 {
    margin-right: 1rem;
  }

  .md\:mr-0 {
    margin-right: 0px;
  }

  .md\:mt-6 {
    margin-top: 1.5rem;
  }

  .md\:mb-12 {
    margin-bottom: 3rem;
  }

  .md\:mt-0 {
    margin-top: 0px;
  }

  .md\:mr-6 {
    margin-right: 1.5rem;
  }

  .md\:mr-2 {
    margin-right: 0.5rem;
  }

  .md\:mr-24 {
    margin-right: 6rem;
  }

  .md\:block {
    display: block;
  }

  .md\:inline {
    display: inline;
  }

  .md\:flex {
    display: flex;
  }

  .md\:inline-flex {
    display: inline-flex;
  }

  .md\:grid {
    display: grid;
  }

  .md\:hidden {
    display: none;
  }

  .md\:h-auto {
    height: auto;
  }

  .md\:h-96 {
    height: 24rem;
  }

  .md\:h-4 {
    height: 1rem;
  }

  .md\:h-full {
    height: 100%;
  }

  .md\:w-64 {
    width: 16rem;
  }

  .md\:w-48 {
    width: 12rem;
  }

  .md\:w-auto {
    width: auto;
  }

  .md\:w-4 {
    width: 1rem;
  }

  .md\:w-full {
    width: 100%;
  }

  .md\:max-w-xl {
    max-width: 36rem;
  }

  .md\:max-w-screen-md {
    max-width: 768px;
  }

  .md\:grid-cols-3 {
    grid-template-columns: repeat(3, minmax(0, 1fr));
  }

  .md\:grid-cols-2 {
    grid-template-columns: repeat(2, minmax(0, 1fr));
  }

  .md\:grid-cols-4 {
    grid-template-columns: repeat(4, minmax(0, 1fr));
  }

  .md\:flex-row {
    flex-direction: row;
  }

  .md\:items-center {
    align-items: center;
  }

  .md\:justify-between {
    justify-content: space-between;
  }

  .md\:gap-6 {
    gap: 1.5rem;
  }

  .md\:gap-8 {
    gap: 2rem;
  }

  .md\:gap-12 {
    gap: 3rem;
  }

  .md\:space-x-3 > :not([hidden]) ~ :not([hidden]) {
    --tw-space-x-reverse: 0;
    margin-right: calc(0.75rem * var(--tw-space-x-reverse));
    margin-left: calc(0.75rem * calc(1 - var(--tw-space-x-reverse)));
  }

  .md\:space-x-8 > :not([hidden]) ~ :not([hidden]) {
    --tw-space-x-reverse: 0;
    margin-right: calc(2rem * var(--tw-space-x-reverse));
    margin-left: calc(2rem * calc(1 - var(--tw-space-x-reverse)));
  }

  .md\:space-y-0 > :not([hidden]) ~ :not([hidden]) {
    --tw-space-y-reverse: 0;
    margin-top: calc(0px * calc(1 - var(--tw-space-y-reverse)));
    margin-bottom: calc(0px * var(--tw-space-y-reverse));
  }

  .md\:space-x-4 > :not([hidden]) ~ :not([hidden]) {
    --tw-space-x-reverse: 0;
    margin-right: calc(1rem * var(--tw-space-x-reverse));
    margin-left: calc(1rem * calc(1 - var(--tw-space-x-reverse)));
  }

  .md\:space-x-2 > :not([hidden]) ~ :not([hidden]) {
    --tw-space-x-reverse: 0;
    margin-right: calc(0.5rem * var(--tw-space-x-reverse));
    margin-left: calc(0.5rem * calc(1 - var(--tw-space-x-reverse)));
  }

  .md\:rounded-none {
    border-radius: 0px;
  }

  .md\:rounded-l-lg {
    border-top-left-radius: 0.5rem;
    border-bottom-left-radius: 0.5rem;
  }

  .md\:rounded-t-none {
    border-top-left-radius: 0px;
    border-top-right-radius: 0px;
  }

  .md\:rounded-tl-lg {
    border-top-left-radius: 0.5rem;
  }

  .md\:rounded-br-lg {
    border-bottom-right-radius: 0.5rem;
  }

  .md\:border-0 {
    border-width: 0px;
  }

  .md\:border-r {
    border-right-width: 1px;
  }

  .md\:border-b-0 {
    border-bottom-width: 0px;
  }

  .md\:bg-transparent {
    background-color: transparent;
  }

  .md\:bg-white {
    --tw-bg-opacity: 1;
    background-color: rgb(255 255 255 / var(--tw-bg-opacity));
  }

  .md\:p-8 {
    padding: 2rem;
  }

  .md\:p-0 {
    padding: 0px;
  }

  .md\:p-6 {
    padding: 1.5rem;
  }

  .md\:px-6 {
    padding-left: 1.5rem;
    padding-right: 1.5rem;
  }

  .md\:py-8 {
    padding-top: 2rem;
    padding-bottom: 2rem;
  }

  .md\:px-4 {
    padding-left: 1rem;
    padding-right: 1rem;
  }

  .md\:px-5 {
    padding-left: 1.25rem;
    padding-right: 1.25rem;
  }

  .md\:py-2\.5 {
    padding-top: 0.625rem;
    padding-bottom: 0.625rem;
  }

  .md\:py-2 {
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
  }

  .md\:pr-4 {
    padding-right: 1rem;
  }

  .md\:pb-4 {
    padding-bottom: 1rem;
  }

  .md\:text-xl {
    font-size: 1.25rem;
    line-height: 1.75rem;
  }

  .md\:text-sm {
    font-size: 0.875rem;
    line-height: 1.25rem;
  }

  .md\:text-5xl {
    font-size: 3rem;
    line-height: 1;
  }

  .md\:text-lg {
    font-size: 1.125rem;
    line-height: 1.75rem;
  }

  .md\:text-4xl {
    font-size: 2.25rem;
    line-height: 2.5rem;
  }

  .md\:font-medium {
    font-weight: 500;
  }

  .md\:text-blue-700 {
    --tw-text-opacity: 1;
    color: rgb(26 86 219 / var(--tw-text-opacity));
  }

  .md\:text-green-700 {
    --tw-text-opacity: 1;
    color: rgb(4 108 78 / var(--tw-text-opacity));
  }

  .md\:hover\:bg-transparent:hover {
    background-color: transparent;
  }

  .md\:hover\:text-blue-700:hover {
    --tw-text-opacity: 1;
    color: rgb(26 86 219 / var(--tw-text-opacity));
  }

  .md\:hover\:text-blue-600:hover {
    --tw-text-opacity: 1;
    color: rgb(28 100 242 / var(--tw-text-opacity));
  }

  .md\:hover\:text-green-700:hover {
    --tw-text-opacity: 1;
    color: rgb(4 108 78 / var(--tw-text-opacity));
  }

  .dark .md\:dark\:bg-transparent {
    background-color: transparent;
  }

  .dark .md\:dark\:bg-gray-900 {
    --tw-bg-opacity: 1;
    background-color: rgb(17 24 39 / var(--tw-bg-opacity));
  }

  .dark .md\:dark\:text-white {
    --tw-text-opacity: 1;
    color: rgb(255 255 255 / var(--tw-text-opacity));
  }

  .dark .md\:dark\:hover\:bg-transparent:hover {
    background-color: transparent;
  }

  .dark .md\:dark\:hover\:text-blue-500:hover {
    --tw-text-opacity: 1;
    color: rgb(63 131 248 / var(--tw-text-opacity));
  }

  .dark .md\:dark\:hover\:text-white:hover {
    --tw-text-opacity: 1;
    color: rgb(255 255 255 / var(--tw-text-opacity));
  }
}

@media (min-width: 1024px) {

  .lg\:static {
    position: static;
  }

  .lg\:sticky {
    position: sticky;
  }

  .lg\:top-28 {
    top: 7rem;
  }

  .lg\:order-2 {
    order: 2;
  }

  .lg\:order-1 {
    order: 1;
  }

  .lg\:col-span-7 {
    grid-column: span 7 / span 7;
  }

  .lg\:col-span-5 {
    grid-column: span 5 / span 5;
  }

  .lg\:my-12 {
    margin-top: 3rem;
    margin-bottom: 3rem;
  }

  .lg\:my-8 {
    margin-top: 2rem;
    margin-bottom: 2rem;
  }

  .lg\:mb-0 {
    margin-bottom: 0px;
  }

  .lg\:mr-0 {
    margin-right: 0px;
  }

  .lg\:mb-8 {
    margin-bottom: 2rem;
  }

  .lg\:mt-0 {
    margin-top: 0px;
  }

  .lg\:mb-16 {
    margin-bottom: 4rem;
  }

  .lg\:mt-10 {
    margin-top: 2.5rem;
  }

  .lg\:block {
    display: block;
  }

  .lg\:flex {
    display: flex;
  }

  .lg\:grid {
    display: grid;
  }

  .lg\:hidden {
    display: none;
  }

  .lg\:h-auto {
    height: auto;
  }

  .lg\:h-\[calc\(100vh-3rem\)\] {
    height: calc(100vh - 3rem);
  }

  .lg\:h-12 {
    height: 3rem;
  }

  .lg\:h-6 {
    height: 1.5rem;
  }

  .lg\:max-h-full {
    max-height: 100%;
  }

  .lg\:w-48 {
    width: 12rem;
  }

  .lg\:w-12 {
    width: 3rem;
  }

  .lg\:w-6 {
    width: 1.5rem;
  }

  .lg\:w-auto {
    width: auto;
  }

  .lg\:max-w-7xl {
    max-width: 80rem;
  }

  .lg\:max-w-screen-lg {
    max-width: 1024px;
  }

  .lg\:grid-cols-4 {
    grid-template-columns: repeat(4, minmax(0, 1fr));
  }

  .lg\:grid-cols-12 {
    grid-template-columns: repeat(12, minmax(0, 1fr));
  }

  .lg\:grid-cols-2 {
    grid-template-columns: repeat(2, minmax(0, 1fr));
  }

  .lg\:grid-cols-3 {
    grid-template-columns: repeat(3, minmax(0, 1fr));
  }

  .lg\:flex-row {
    flex-direction: row;
  }

  .lg\:gap-8 {
    gap: 2rem;
  }

  .lg\:space-x-8 > :not([hidden]) ~ :not([hidden]) {
    --tw-space-x-reverse: 0;
    margin-right: calc(2rem * var(--tw-space-x-reverse));
    margin-left: calc(2rem * calc(1 - var(--tw-space-x-reverse)));
  }

  .lg\:self-center {
    align-self: center;
  }

  .lg\:overflow-visible {
    overflow: visible;
  }

  .lg\:overflow-y-visible {
    overflow-y: visible;
  }

  .lg\:border-0 {
    border-width: 0px;
  }

  .lg\:bg-transparent {
    background-color: transparent;
  }

  .lg\:p-8 {
    padding: 2rem;
  }

  .lg\:p-0 {
    padding: 0px;
  }

  .lg\:px-8 {
    padding-left: 2rem;
    padding-right: 2rem;
  }

  .lg\:py-4 {
    padding-top: 1rem;
    padding-bottom: 1rem;
  }

  .lg\:px-4 {
    padding-left: 1rem;
    padding-right: 1rem;
  }

  .lg\:py-0 {
    padding-top: 0px;
    padding-bottom: 0px;
  }

  .lg\:px-2 {
    padding-left: 0.5rem;
    padding-right: 0.5rem;
  }

  .lg\:px-5 {
    padding-left: 1.25rem;
    padding-right: 1.25rem;
  }

  .lg\:py-16 {
    padding-top: 4rem;
    padding-bottom: 4rem;
  }

  .lg\:px-6 {
    padding-left: 1.5rem;
    padding-right: 1.5rem;
  }

  .lg\:py-2\.5 {
    padding-top: 0.625rem;
    padding-bottom: 0.625rem;
  }

  .lg\:py-2 {
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
  }

  .lg\:px-12 {
    padding-left: 3rem;
    padding-right: 3rem;
  }

  .lg\:px-36 {
    padding-left: 9rem;
    padding-right: 9rem;
  }

  .lg\:pt-0 {
    padding-top: 0px;
  }

  .lg\:pt-8 {
    padding-top: 2rem;
  }

  .lg\:pb-16 {
    padding-bottom: 4rem;
  }

  .lg\:pl-0 {
    padding-left: 0px;
  }

  .lg\:pt-2 {
    padding-top: 0.5rem;
  }

  .lg\:pb-20 {
    padding-bottom: 5rem;
  }

  .lg\:pl-3 {
    padding-left: 0.75rem;
  }

  .lg\:text-xs {
    font-size: 0.75rem;
    line-height: 1rem;
  }

  .lg\:text-sm {
    font-size: 0.875rem;
    line-height: 1.25rem;
  }

  .lg\:text-xl {
    font-size: 1.25rem;
    line-height: 1.75rem;
  }

  .lg\:text-2xl {
    font-size: 1.5rem;
    line-height: 2rem;
  }

  .lg\:text-6xl {
    font-size: 3.75rem;
    line-height: 1;
  }

  .lg\:text-blue-700 {
    --tw-text-opacity: 1;
    color: rgb(26 86 219 / var(--tw-text-opacity));
  }

  .lg\:hover\:bg-transparent:hover {
    background-color: transparent;
  }

  .lg\:hover\:text-blue-700:hover {
    --tw-text-opacity: 1;
    color: rgb(26 86 219 / var(--tw-text-opacity));
  }

  .dark .lg\:dark\:hover\:bg-transparent:hover {
    background-color: transparent;
  }

  .dark .lg\:dark\:hover\:text-white:hover {
    --tw-text-opacity: 1;
    color: rgb(255 255 255 / var(--tw-text-opacity));
  }
}

@media (min-width: 1280px) {

  .xl\:ml-16 {
    margin-left: 4rem;
  }

  .xl\:block {
    display: block;
  }

  .xl\:inline-flex {
    display: inline-flex;
  }

  .xl\:hidden {
    display: none;
  }

  .xl\:h-80 {
    height: 20rem;
  }

  .xl\:grid-cols-6 {
    grid-template-columns: repeat(6, minmax(0, 1fr));
  }

  .xl\:gap-24 {
    gap: 6rem;
  }

  .xl\:gap-0 {
    gap: 0px;
  }

  .xl\:gap-16 {
    gap: 4rem;
  }

  .xl\:px-2 {
    padding-left: 0.5rem;
    padding-right: 0.5rem;
  }

  .xl\:px-48 {
    padding-left: 12rem;
    padding-right: 12rem;
  }

  .xl\:pb-24 {
    padding-bottom: 6rem;
  }

  .xl\:pt-24 {
    padding-top: 6rem;
  }

  .xl\:pl-4 {
    padding-left: 1rem;
  }

  .xl\:text-sm {
    font-size: 0.875rem;
    line-height: 1.25rem;
  }

  .xl\:text-6xl {
    font-size: 3.75rem;
    line-height: 1;
  }

  .xl\:after\:mx-10::after {
    content: var(--tw-content);
    margin-left: 2.5rem;
    margin-right: 2.5rem;
  }
}

@media (min-width: 1536px) {

  .\32xl\:block {
    display: block;
  }

  .\32xl\:h-96 {
    height: 24rem;
  }

  .\32xl\:grid-cols-10 {
    grid-template-columns: repeat(10, minmax(0, 1fr));
  }

  .\32xl\:gap-x-2 {
    -moz-column-gap: 0.5rem;
         column-gap: 0.5rem;
  }

  .\32xl\:space-x-0 > :not([hidden]) ~ :not([hidden]) {
    --tw-space-x-reverse: 0;
    margin-right: calc(0px * var(--tw-space-x-reverse));
    margin-left: calc(0px * calc(1 - var(--tw-space-x-reverse)));
  }
}
    img{
        margin: 0 auto;
    }

        </style>
</head>
<body>
        <div class=" smt:mx-4  mdt:mx-48">

            <div class="float-left w-full">
                <label class=" text-center float-left w-full ffarial fweightbold fsize22 mrgbtm10">
                    {{$mailData['data']['eventName']}} Registration
                </label>

            <div class="fln mcenter w-full" style="max-width:600px ; margin:0 auto;">

                <div  style="max-width: 450px;margin: 0 auto;padding: 10px;">
                    <table style="width:100%; border:1px solid darkgray;box-shadow: 0px 0px 8px 2px #ccc;">
                        <tr><th  style="padding:10px">Order Summary</th><th  style="padding:10px"></th></tr>
                        <tr>
                            <td style="padding:10px">Reference Number </td>
                            <td  style="padding:10px"> {{$mailData['data']['registrationData']['payment']['payment_intent']}}</td>
                        </tr>
                        <tr>
                            <td  style="padding:10px">Status </td>
                            <td  style="padding:10px">{{$mailData['data']['registrationData']['payment']['status']}}</td>
                        </tr>
                        <tr>
                            <td  style="padding:10px">Name </td>
                            <td  style="padding:10px">{{$mailData['data']['registrationData']['event_user']['user']['fullname']}}</td>
                        </tr>
                        @if($mailData['data']['registrationData']['event_user']['is_paid_user'] ==1)
                        <tr>
                            <td  style="padding:10px" >Address </td>
                            <td  style="padding:10px">{{$mailData['data']['registrationData']['event_user']['address']." ".$mailData['data']['registrationData']['event_user']['blk']." ".$mailData['data']['registrationData']['event_user']['city']." ".$mailData['data']['registrationData']['event_user']['state']." ".$mailData['data']['registrationData']['event_user']['subdistrict']." ".$mailData['data']['registrationData']['event_user']['postal_code']." ".$mailData['data']['registrationData']['event_user']['country'] }}</td>
                        </tr>
                        @endif

                        @if($mailData['data']['registrationData']['event_user']['is_paid_user'] ==1)
                        <tr>
                            <td  style="padding:10px">Rewards</td>
                            <td  style="padding:10px">
                                @foreach($mailData['data']['registrationData']['payment']['user_reward'] as $rewards)
                                        <p> {{$rewards['rewards']['name']}}</p>
                                @endforeach

                            </td>
                        </tr>
                        @endif
                        @if($mailData['data']['registrationData']['event_user']['team_user'])
                        <tr>
                            <td  style="padding:10px">Team Name</td>
                            <td  style="padding:10px">{{$mailData['data']['registrationData']['event_user']['team_user']['team']['team_name']}}</td>
                        </tr>
                        @endif
                        @if($mailData['data']['registrationData']['event_user']['group'])
                        <tr>
                            <td  style="padding:10px">{{$mailData['data']['groupingHeader']}}</td>
                            <td  style="padding:10px"> {{$mailData['data']['registrationData']['event_user']['group']}}</td>
                        </tr>
                            @endif
                    </table>
                </div>
                @if($mailData['data']['registrationData']['event_user']['is_paid_user'] ==0)
                    {!! $mailData['data']['successPage']['no_purchase_made'] !!}
                    <div class="float-left w-full mt-5 mb-5" style="height:1px;background:#e0e0e0">

                    </div>
                    @elseif($mailData['data']['canUpgrade'] ==1)
                {!! $mailData['data']['successPage']['partial_purchase_made'] !!}
                    <div class="float-left w-full mt-5 mb-5" style="height:1px;background:#e0e0e0">

                    </div>
                    @elseif($mailData['data']['canUpgrade'] ==0)
                {!! $mailData['data']['successPage']['all_purchase_made'] !!}
                    <div class="float-left w-full mt-5 mb-5" style="height:1px;background:#e0e0e0">

                    </div>
                        @endif
                <div class="mt-4">
                {!! $mailData['data']['successPage']['invite_friend'] !!}
                </div>

                <div class="">
                    <div class="float-left w-full ">
                        <div class="fln w-full mcenter" style="max-width: 800px;">
                            <div class="float-left w-full flex flex-col">
                                <div class="float-left w-full flex flex-col ">

                                    <div class=" mt-4 flex flex-col" style="width: 98%;max-width:600px" id="social">

                                        <div class="float-left w-full text-center fpoppins mb-2">
                                            <a target="_blank" href="//api.whatsapp.com/send?text=<?php echo '' ?><?php echo env("APP_URL").''.$mailData['data']['eventName'] ?>" data-href=<?php echo env("APP_URL").''.$mailData['data']['eventName'] ?> data-action="share/whatsapp/share" class="float-left w-full block rounded text-white tdnone flex justify-center items-center fr-share-btn" data-share="whatsapp" style="height:40px;line-height:40px;background-color:#21B865;color:#fff !important;"><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M18.3125 3.59375C16.3906 1.625 13.7656 0.5 10.9531 0.5C5.23438 0.5 0.546875 5.1875 0.546875 10.9062C0.546875 12.7812 1.0625 14.5625 1.95312 16.1094L0.5 21.5L5.98438 20.0938C7.53125 20.8906 9.21875 21.3594 10.9531 21.3594C16.7188 21.3594 21.5 16.6719 21.5 10.9531C21.5 8.14062 20.2812 5.5625 18.3125 3.59375ZM10.9531 19.5781C9.40625 19.5781 7.90625 19.1562 6.54688 18.3594L6.26562 18.1719L2.98438 19.0625L3.875 15.875L3.64062 15.5469C2.79688 14.1406 2.32812 12.5469 2.32812 10.9062C2.32812 6.17188 6.21875 2.28125 11 2.28125C13.2969 2.28125 15.4531 3.17188 17.0938 4.8125C18.7344 6.45312 19.7188 8.60938 19.7188 10.9531C19.7188 15.6875 15.7344 19.5781 10.9531 19.5781ZM15.7344 13.1094C15.4531 12.9688 14.1875 12.3594 13.9531 12.2656C13.7188 12.1719 13.5312 12.125 13.3438 12.4062C13.2031 12.6406 12.6875 13.25 12.5469 13.4375C12.3594 13.5781 12.2188 13.625 11.9844 13.4844C10.4375 12.7344 9.45312 12.125 8.42188 10.3906C8.14062 9.92188 8.70312 9.96875 9.17188 8.98438C9.26562 8.79688 9.21875 8.65625 9.17188 8.51562C9.125 8.375 8.5625 7.10938 8.375 6.59375C8.14062 6.07812 7.95312 6.125 7.76562 6.125C7.625 6.125 7.4375 6.125 7.29688 6.125C7.10938 6.125 6.82812 6.17188 6.59375 6.45312C6.35938 6.73438 5.70312 7.34375 5.70312 8.60938C5.70312 9.92188 6.59375 11.1406 6.73438 11.3281C6.875 11.4688 8.5625 14.0938 11.1875 15.2188C12.8281 15.9688 13.4844 16.0156 14.3281 15.875C14.7969 15.8281 15.8281 15.2656 16.0625 14.6562C16.2969 14.0469 16.2969 13.5312 16.2031 13.4375C16.1562 13.2969 15.9688 13.25 15.7344 13.1094Z" fill="white"/>
                                                </svg>
                                                <span class="ml-3">Share on Whatsapp</span></a>
                                        </div>
                                        <div class="float-left w-full text-center fpoppins mb-2">
                                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo env("APP_URL").''.$mailData['data']['eventName'] ?> " target="_blank" class="float-left w-full  block rounded text-white tdnone  flex justify-center items-center" style="height:40px;line-height:40px;background:#0D87E2;color:#fff !important;"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M23.625 12C23.625 5.57812 18.4219 0.375 12 0.375C5.57812 0.375 0.375 5.57812 0.375 12C0.375 17.8125 4.59375 22.6406 10.1719 23.4844V15.375H7.21875V12H10.1719V9.46875C10.1719 6.5625 11.9062 4.92188 14.5312 4.92188C15.8438 4.92188 17.1562 5.15625 17.1562 5.15625V8.01562H15.7031C14.25 8.01562 13.7812 8.90625 13.7812 9.84375V12H17.0156L16.5 15.375H13.7812V23.4844C19.3594 22.6406 23.625 17.8125 23.625 12Z" fill="white"/>
                                                </svg>
                                                <span class="ml-3">Share on Facebook</span></a>
                                        </div>
                                        <div class="float-left w-full text-center fpoppins mb-2">
                                            <a href="https://twitter.com/intent/tweet?text=<?php echo '' ?>&url=<?php echo env("APP_URL").''.$mailData['data']['eventName'] ?>" data-href=<?php echo env("APP_URL").''.$mailData['data']['eventName'] ?>  target="_blank" class="float-left w-full  block rounded text-white tdnone fr-share-btn  flex justify-center items-center" data-share="twitter" style="height:40px;line-height:40px;background-color:#03A9F4;color:#fff !important;"><svg width="24" height="20" viewBox="0 0 24 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M21.5156 5.125C22.4531 4.42188 23.2969 3.57812 23.9531 2.59375C23.1094 2.96875 22.125 3.25 21.1406 3.34375C22.1719 2.73438 22.9219 1.79688 23.2969 0.625C22.3594 1.1875 21.2812 1.60938 20.2031 1.84375C19.2656 0.859375 18 0.296875 16.5938 0.296875C13.875 0.296875 11.6719 2.5 11.6719 5.21875C11.6719 5.59375 11.7188 5.96875 11.8125 6.34375C7.73438 6.10938 4.07812 4.14062 1.64062 1.1875C1.21875 1.89062 0.984375 2.73438 0.984375 3.67188C0.984375 5.35938 1.82812 6.85938 3.1875 7.75C2.39062 7.70312 1.59375 7.51562 0.9375 7.14062V7.1875C0.9375 9.57812 2.625 11.5469 4.875 12.0156C4.5 12.1094 4.03125 12.2031 3.60938 12.2031C3.28125 12.2031 3 12.1562 2.67188 12.1094C3.28125 14.0781 5.10938 15.4844 7.26562 15.5312C5.57812 16.8438 3.46875 17.6406 1.17188 17.6406C0.75 17.6406 0.375 17.5938 0 17.5469C2.15625 18.9531 4.73438 19.75 7.54688 19.75C16.5938 19.75 21.5156 12.2969 21.5156 5.78125C21.5156 5.54688 21.5156 5.35938 21.5156 5.125Z" fill="white"/>
                                                </svg>
                                                <span class="ml-3">Share on Twitter</span></a>
                                        </div>
                                        <div class="float-left w-full text-center fpoppins mb-2">
                                            <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo env("APP_URL").''.$mailData['data']['eventName'] ?> " target="_blank" class="float-left w-full  block rounded text-white tdnone  flex justify-center items-center" style="height:40px;line-height:40px;background-color:#0077B5;color:#fff !important;"><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M20 0.5H1.95312C1.15625 0.5 0.5 1.20312 0.5 2.04688V20C0.5 20.8438 1.15625 21.5 1.95312 21.5H20C20.7969 21.5 21.5 20.8438 21.5 20V2.04688C21.5 1.20312 20.7969 0.5 20 0.5ZM6.82812 18.5H3.73438V8.51562H6.82812V18.5ZM5.28125 7.10938C4.25 7.10938 3.45312 6.3125 3.45312 5.32812C3.45312 4.34375 4.25 3.5 5.28125 3.5C6.26562 3.5 7.0625 4.34375 7.0625 5.32812C7.0625 6.3125 6.26562 7.10938 5.28125 7.10938ZM18.5 18.5H15.3594V13.625C15.3594 12.5 15.3594 11 13.7656 11C12.125 11 11.8906 12.2656 11.8906 13.5781V18.5H8.79688V8.51562H11.75V9.875H11.7969C12.2188 9.07812 13.25 8.23438 14.75 8.23438C17.8906 8.23438 18.5 10.3438 18.5 13.0156V18.5Z" fill="white"/>
                                                </svg>
                                                <span class="ml-3">Share on LinkedIn</span></a>
                                        </div>
                                        <div class="float-left w-full text-center fpoppins mb-2">
                                            <a href="https://telegram.me/share/url?url=<?php echo env("APP_URL").''.$mailData['data']['eventName'] ?>&text=<?php '' ?>" data-href=<?php echo env("APP_URL").''.$mailData['data']['eventName'] ?>  data-share="telegram" class="float-left fr-share-btn w-full  block rounded text-white tdnone  flex justify-center items-center" style="height:40px;line-height:40px;background-color:#0088CC;color:#fff !important;"><svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12.5 0.375C6.07812 0.375 0.875 5.57812 0.875 12C0.875 18.4219 6.07812 23.625 12.5 23.625C18.9219 23.625 24.125 18.4219 24.125 12C24.125 5.57812 18.9219 0.375 12.5 0.375ZM18.1719 8.34375L16.2969 17.3438C16.1562 18 15.7812 18.1406 15.2188 17.8594L12.3125 15.7031L10.9062 17.0625C10.7656 17.2031 10.625 17.3438 10.3438 17.3438L10.5312 14.3906L15.9219 9.51562C16.1562 9.32812 15.875 9.1875 15.5469 9.375L8.89062 13.5938L6.03125 12.7031C5.42188 12.5156 5.42188 12.0469 6.17188 11.7656L17.375 7.45312C17.8906 7.26562 18.3594 7.59375 18.1719 8.34375Z" fill="white"/>
                                                </svg>
                                                <span class="ml-3">Share on Telegram</span></a>
                                        </div>

                                        </div>
                                    </div>
                                    <div class="flex flex-col">
                                        <p class="float-left w-full text-center mobtext-center fpoppins" style="color: #6e6e6e;">Alternatively, you can also share the referral code with your friends.</p>
                                        <p class="float-left w-full fweightbold text-center fpoppins fsize22 mrgtop20" style="margin-bottom: 0px;"><?php echo "Referral Code"?> : <span style="color: #00acea;">{{$mailData['data']['registrationData']['event_user']['user']['username']}}</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="float-left w-full mrgtop20 mrgbtm20" style="height:1px;background:#e0e0e0">

                    </div>

                    <div class="float-left w-full">
                        <div class="fln w-full mcenter" style="max-width: 800px;">
                            <div class="float-left w-full">
                                <div class="float-left w-full text-center">
                                    <label class="float-left w-full ffarial fweightbold fsize22 mrgbtm10"><?php echo "Next Steps"?></label>
                                </div>

                                <div class="float-left w-full mrgtop20  ffarial fweight400 fsize14 text-black">
                                    <p class="float-left w-full text-center mrgbtm10">1. <?php echo "First, download the TOGOPARTS app on your mobile phone"?></p>
                                    <p class="float-left w-full text-center mrgbtm10">2. <?php echo "Once you have downloaded the app, open it and click on the \"RECORD\" button to start recording your live activities."?></p>
                                    <p class="float-left w-full text-center mrgbtm10">3. <?php echo "The app will then take you to the Strava app, which is used to record your rides. Please ensure that your privacy settings on Strava are set to \"EVERYONE\" so that your rides can be recorded."?></p>
                                    <p class="float-left w-full text-center mrgbtm10">4. <?php echo "Once you have verified and adjusted your Strava privacy settings as needed, you can begin your ride."?></p>
                                    <p class="float-left w-full text-center ">5. <?php echo "Make sure to start your ride during (from <STARTDATE> <STARTIME>hrs to <ENDDATE> <ENDTIME>hrs)"?></p>
                                </div>
                                @if($mailData['data']['registrationData']['event_user']['user']['strava_id'] ==0 || $mailData['data']['registrationData']['event_user']['user']['strava_id'] =="")


                                <div>
                                    <div class="float-left w-full text-center">
                                        <label class="float-left w-full ffarial fweightbold fsize22 mrgbtm10">
                                            Connect to STRAVA
                                        </label>
                                    </div>
                                    <div class="float-left w-full mrgtop20  ffarial fweight400 fsize14 text-black">
                                        <p class="float-left w-full text-center mrgbtm10">If you have not authorised togoparts to connect to yur strava account or if you are unsure
                                        if you have done so already, CONNECT WITH STRAVA now</p>
                                    </div>
                                    <div class="float-left w-full text-center">
                                    <label class="float-left w-full ffarial fweightbold fsize22 mrgbtm10">Set STRAVA permissions</label>
                                    </div>
                                    <div class="float-left w-full mrgtop20  ffarial fweight400 fsize14 text-black">

                                        <p class="float-left w-full text-center mrgbtm10">If you have connected with strava after registration with all the boxes ticked, you are good to go. Otherwise, double-check to ensure that your privacy settings are set to Everyone for your activities to be recorded.</p>
                                    </div>
                                </div>
                            @endif
                            </div>
                        </div>
                    </div>

                    <div class="float-left w-full text-center mrgtop30 mrgbtm40 dispflex jcenter acenter fwrap0 mobfwrap1 mobjcenter">
                        <div class="float-left wauto mobw-full">
                            <h4 class="float-left w-full fweightbold">iOS</h4>
                            <img src="https://www.togoparts.com/images/ios1.png"  class="mb-2" style="max-height: 400px;">
                            <img src="https://www.togoparts.com/images/ios2.png" class="mb-2" style="max-height: 400px;">
                        </div>
                        <div class="float-left wauto mobw-full mt-2">
                            <h4 class="float-left w-full fweightbold">Android</h4>
                            <img src="/images/android1.png" class="mb-2" style="max-height: 400px;">
                            <img src="/images/android2.png" class="mb-2" style="max-height: 400px;">

                    </div>


                </div>
                    <div class="float-left w-full fpoppins mrgbtm40 mrgtop20 text-center ">
                        <a href="https://www.togoparts.com/app" class=" text-center fpoppins text-white no-underline p-2 rounded" style="color: #fff;background:#F6861F;">Download togoparts app</a>
                    </div>
            </div>

            </div>
        </div>
</body>
</html>
