import React from 'react';

export const GoogleMap = ({ placeMap, title, description, contactEmail, buttonUrl }) => {
  return (
    <section className="relative nwp-padding-x-container  ">
      <div className='mx-auto nwp-container flex'>
        <div className='md:w-1/2'>
          <iframe 
            src={placeMap} 
            width="100%" 
            height="600" 
            allowFullScreen={false} 
            loading="lazy" 
            referrerPolicy="no-referrer-when-downgrade">
          </iframe>
        </div>
        <div className="w-full  md:w-1/2 flex flex-col items-start justify-center lg:px-8 lg:gap-y-8 p-4">
          <h1 className="text-3xl lg:text-5xl font-bold pt-16 lg:pt-0">{title}</h1>
          <p className="text-lg">{description}</p>
          <p className="text-lg">
            <span className="font-semibold">Contacto: </span> 
            <a href={`mailto:${contactEmail}`} className="text-blue-500 hover:underline">{contactEmail}</a>
          </p>
          <a 
            href={buttonUrl}
            className="flex gap-x-2 font-semibold text-lg items-center hover:no-underline hover:text-cdsblue duration-150 transition-all"
            target="_blank"
          >
            Conoce cómo llegar
            <div className="h-8 w-8 bg-cdsblue rounded-full grid place-content-center">
              <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="32px" fill="#e8eaed">
                <path d="M673-446.67H160v-66.66h513l-240-240L480-800l320 320-320 320-47-46.67 240-240Z"/>
              </svg>
            </div>
          </a>
        </div>
      </div>
    </section>
  );
};
