import React from "react";
import { IgIcon } from './icons/SocialNetworks';

export default function Headband ({ imageSrc, mainTitle, subtitle, instagramLink, instagramHandle }) {
  return (
    <>
      <div className='h-[322px] w-full flex items-center justify-center'>
        <img src={imageSrc} alt="Image" className='w-full h-full object-cover object-center' />
      </div>

      <div className='nwp-padding-x-container bg-verde-habitat-accesible'>
        <div className='nwp-container mx-auto md:h-[152px] flex flex-col md:flex-row gap-6 md:gap-0 items-center justify-between py-8 text-white'>
          <div className='nwp-aling-text'>
            <h3 className='uppercase text-4xl font-bold'>{mainTitle}</h3>
            <h6 className='font-bold text-xl'>{subtitle}</h6>
          </div>
          <a
            href={instagramLink}
            className='flex items-center gap-2 font-bold text-2xl hover:text-white hover:no-underline'
          >
            <IgIcon size={48} color="#fff" className="mi-clase" strokeWidth={2} /> 
            {instagramHandle}
          </a>
        </div>
      </div>
    </>
  );
};