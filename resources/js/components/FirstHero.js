import React from 'react';

const FirstHero = ({ title, subtitle, schedule, location, onButtonClick }) => {
  return (
    <div className='h-[5000px] md:h-[524px] max-h-[524px]'>
      <div 
        className='bg-cover bg-center relative h-full  
        bg-[url("https://images.unsplash.com/photo-1663622438610-00a72c139d8c?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D")]'
      >
        <div className='absolute inset-0 h-full nwp-padding-x-container bg-gradient-to-t md:bg-gradient-to-r from-cdsverde via-cdsverde to-transparent'>
          <div className='md:mx-auto nwp-container h-full flex flex-col justify-end'>
            <h1 className='pt-0 md:pt-[174px] text-4xl w-full md:w-2/3 lg:w-1/2 md:text-6xl text-white font-bold'>
              {title}
            </h1>
            <p className='text-lg md:text-2xl font-bold text-white pt-2 pb-4 md:pb-0 lg:pb-0'>
              {subtitle}
            </p>
            <div className='md:mt-14'>
              <div className='border-t py-4 border-white flex flex-col md:flex-row gap-y-4 md:gap-y-0 md:items-center md:justify-between text-white font-semibold'>
                <div className='flex flex-col md:flex-row gap-y-4 md:gap-y-0 md:gap-x-8'>
                  <p>Horario: <span className='font-normal'>{schedule}</span></p>
                  <p>Ubicación: <span className='font-normal'>{location}</span></p>
                </div>
                <button 
                  className='px-4 py-2 bg-white flex gap-x-4 justify-center rounded-lg font-semibold text-black hover:bg-cdsgray600 duration-150 ease-in-out focus:outline-none focus:scale-95'
                  onClick={onButtonClick}
                >
                  Descargar el mapa
                  

                </button>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default FirstHero;