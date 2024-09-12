import React from 'react';
import { IconArrowRight, IconHome } from './icons/Icons';
import {LanguageProvider, useLanguage } from './context/LanguageProvider';

const FirstHero = ({ title, subtitle, schedule, location, onButtonClick, gradientColor, backgroundImageUrl, buttonText, isVenue }) => {
  const { language } = useLanguage(); 

  const translations = {
    es: {
      homeText: "Inicio",
      parkText: "El Parque",
      scheduleLabel: "Horario",
      locationLabel: "Ubicación",
    },
    en: {
      homeText: "Home",
      parkText: "The Park",
      scheduleLabel: "Schedule",
      locationLabel: "Location",
    },
  };

  const containerHeight = subtitle ? 'md:h-[524px]' : 'md:h-[406px]';

  return (
      <div className={`h-[5000px] ${containerHeight} max-h-[524px]`}>
        <div 
          className='bg-cover bg-center relative h-full' 
          style={{ backgroundImage: `url(${backgroundImageUrl})` }}
        >
          <div className={`absolute inset-0 h-full nwp-padding-x-container bg-gradient-to-t md:bg-gradient-to-r ${gradientColor}`}>
            <div className='md:mx-auto nwp-container h-full flex flex-col justify-between pt-8 md:pt-20'>

              <div className={`inline-flex justify-center gap-2 h-9 py-2 px-3 text-sm rounded-full bg-black bg-opacity-45 text-white md:mb-14 ${isVenue === true ? 'w-52' : 'w-24'}`}>
                <a className='underline hover:text-white flex gap-1' href=''>
                  <IconHome color="#fff" size="20px" rotate={0} className="hover:text-blue-500 fill-white" />
                  {translations[language].homeText}
                </a>
                {isVenue && (
                  <>
                    <IconArrowRight color="#fff" size="20px" rotate={270} className="hover:text-blue-500 fill-white" />
                    <a className='underline hover:text-white flex gap-1' href=''>
                      {translations[language].parkText}
                    </a>
                  </>
                )}
              </div>

              <div className='flex flex-col justify-center md:justify-start h-full gap-y-4'>
                <h1 className='pt-0 text-5xl w-full md:w-2/3 md:text-6xl text-white font-bold'>
                  {title}
                </h1>
                {subtitle && (
                  <p className='text-xl md:text-2xl font-bold text-white pb-4 md:pb-0 lg:pb-0'>
                    {subtitle}
                  </p>
                )}
              </div>
              {schedule && location && buttonText && (
                <div className='md:mt-14'>
                  <div className='border-t py-4 border-white flex flex-col md:flex-row gap-y-4 md:gap-y-0 md:items-center md:justify-between text-white font-semibold'>
                    <div className='flex flex-col md:flex-row gap-y-4 md:gap-y-0 md:gap-x-8'>
                      <p>{translations[language].scheduleLabel}: <span className='font-normal'>{schedule}</span></p>
                      <p>{translations[language].locationLabel}: <span className='font-normal'>{location}</span></p>
                    </div>
                    <button
                      className='px-4 py-2 bg-white flex gap-x-4 justify-center rounded-lg font-semibold text-black hover:bg-cdsgray600 duration-150 ease-in-out focus:outline-none focus:scale-95'
                      onClick={onButtonClick}
                    >
                      {buttonText}
                    </button>
                  </div>
                </div>
              )}
            </div>
          </div>
        </div>
      </div>
  );
};

export default FirstHero;
