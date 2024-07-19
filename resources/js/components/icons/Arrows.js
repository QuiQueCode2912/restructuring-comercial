import React from 'react';

export const ArrowIcon = ({ color = '#e8eaed', className = '', rotate }) => (
  <svg
    xmlns="http://www.w3.org/2000/svg"
    height="32px"
    viewBox="0 -960 960 960"
    width="32px"
    fill={color}
    className={className}
    style={{ transform: rotate ? 'rotate(180deg)' : 'rotate(0deg)', transition: 'transform 0.3s ease' }}
  >
    <path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z" />
  </svg>
);

export const ArrowIconRight = ({ className = '', isBlue = false }) => (
  <svg
    xmlns="http://www.w3.org/2000/svg"
    height="32px"
    viewBox="0 -960 960 960"
    width="32px"
    fill="currentColor"
    className={`text-black ${isBlue ? 'text-cdsblue' : ''} ${className}`}
  >
    <path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z" transform="rotate(-90, 480, -480)" />
  </svg>
);
