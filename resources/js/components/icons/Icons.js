import React from "react";

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