import React from "react";

//Icono de una casita
export const IconHome = ({ className = '', color = '#e8eaed', size = '24px', rotate = 0, ariaLabel = 'home icon' }) => (
  <svg
    xmlns="http://www.w3.org/2000/svg"
    height={size}
    viewBox="0 -960 960 960"
    width={size}
    fill={color}
    className={className}
    aria-label={ariaLabel}
    role="img"
    style={{ transform: `rotate(${rotate}deg)` }}
  >
    <path d="M240-200h120v-240h240v240h120v-360L480-740 240-560v360Zm-80 80v-480l320-240 320 240v480H520v-240h-80v240H160Zm320-350Z"/>
  </svg>
);

export const IconArrowDown = ({ className = '', color = '#e8eaed', size = '32px', rotate = 0, ariaLabel = 'arrow icon' }) => (
  <svg
    xmlns="http://www.w3.org/2000/svg"
    height={size}
    viewBox="0 -960 960 960"
    width={size}
    fill={color}
    className={className}
    aria-label={ariaLabel}
    role="img"
    style={{ transform: `rotate(${rotate}deg)`, transition: 'transform 0.3s ease' }}
  >
    <path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z" />
  </svg>
);

export const IconArrowRight = ({ className = '', color = 'currentColor', size = '32px', rotate = -90, ariaLabel = 'arrow right icon', isBlue = false }) => (
  <svg
    xmlns="http://www.w3.org/2000/svg"
    height={size}
    viewBox="0 -960 960 960"
    width={size}
    fill={color}
    className={`text-black ${isBlue ? 'text-cdsblue' : ''} ${className}`}
    aria-label={ariaLabel}
    role="img"
    style={{ transform: `rotate(${rotate}deg)` }}
  >
    <path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z" />
  </svg>
);

export const ArrowWhitBg = ({ className = '', color = '#FFFFFF', size = '24px', rotate = 0, ariaLabel = 'arrow with background icon' }) => (
  <svg
    xmlns="http://www.w3.org/2000/svg"
    height={size}
    viewBox="0 -960 960 960"
    width={size}
    fill={color}
    className={className}
    aria-label={ariaLabel}
    role="img"
    style={{ transform: `rotate(${rotate}deg)` }}
  >
    <path d="M647-440H160v-80h487L423-744l57-56 320 320-320 320-57-56 224-224Z"/>
  </svg>
);

export const RedirectArrow = ({ className = '', color = 'black', size = '24px', rotate = 0, ariaLabel = 'redirect arrow icon' }) => (
  <svg
    xmlns="http://www.w3.org/2000/svg"
    height={size}
    viewBox="0 0 24 24"
    width={size}
    fill={color}
    className={className}
    aria-label={ariaLabel}
    role="img"
    style={{ transform: `rotate(${rotate}deg)` }}
  >
    <path d="M18 19H6C5.45 19 5 18.55 5 18V6C5 5.45 5.45 5 6 5H11C11.55 5 12 4.55 12 4C12 3.45 11.55 3 11 3H5C3.89 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V13C21 12.45 20.55 12 20 12C19.45 12 19 12.45 19 13V18C19 18.55 18.55 19 18 19ZM14 4C14 4.55 14.45 5 15 5H17.59L8.46 14.13C8.07 14.52 8.07 15.15 8.46 15.54C8.85 15.93 9.48 15.93 9.87 15.54L19 6.41V9C19 9.55 19.45 10 20 10C20.55 10 21 9.55 21 9V3H15C14.45 3 14 3.45 14 4Z"/>
  </svg>
);

//Icono de lenguaje
export const IconLanguage = ({ className = '', color = '#e8eaed', size = '24px', rotate = 0, ariaLabel = 'language icon' }) => (
  <svg
    xmlns="http://www.w3.org/2000/svg"
    height={size}
    viewBox="0 -960 960 960"
    width={size}
    fill={color}
    className={className}
    aria-label={ariaLabel}
    role="img"
    style={{ transform: `rotate(${rotate}deg)` }}
  >
    <path d="M480-80q-82 0-155-31.5t-127.5-86Q143-252 111.5-325T80-480q0-83 31.5-155.5t86-127Q252-817 325-848.5T480-880q83 0 155.5 31.5t127 86q54.5 54.5 86 127T880-480q0 82-31.5 155t-86 127.5q-54.5 54.5-127 86T480-80Zm0-82q26-36 45-75t31-83H404q12 44 31 83t45 75Zm-104-16q-18-33-31.5-68.5T322-320H204q29 50 72.5 87t99.5 55Zm208 0q56-18 99.5-55t72.5-87H638q-9 38-22.5 73.5T584-178ZM170-400h136q-3-20-4.5-39.5T300-480q0-21 1.5-40.5T306-560H170q-5 20-7.5 39.5T160-480q0 21 2.5 40.5T170-400Zm216 0h188q3-20 4.5-39.5T580-480q0-21-1.5-40.5T574-560H386q-3 20-4.5 39.5T380-480q0 21 1.5 40.5T386-400Zm268 0h136q5-20 7.5-39.5T800-480q0-21-2.5-40.5T790-560H654q3 20 4.5 39.5T660-480q0 21-1.5 40.5T654-400Zm-16-240h118q-29-50-72.5-87T584-782q18 33 31.5 68.5T638-640Zm-234 0h152q-12-44-31-83t-45-75q-26 36-45 75t-31 83Zm-200 0h118q9-38 22.5-73.5T376-782q-56 18-99.5 55T204-640Z"/>
  </svg>
);