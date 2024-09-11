import React from 'react';

const IconCardSection = ({ title, cards }) => {
  return (
    <div className='nwp-padding-x-container bg-cdsgray700'>
      <div className='mx-auto nwp-container py-20'>
        <h6 className='font-bold text-3xl md:text-5xl'>{title}</h6>
        <div className='grid grid-cols-1 md:grid-cols-4 gap-8 pt-12'>
          {cards.map((card, index) => (
            <div key={index} className='w-full p-4 bg-white flex  gap-x-4 md:gap-x-0 md:flex-col rounded-xl'>
              <div className='h-12 w-12 min-h-12 min-w-12 bg-cdsblue bg-opacity-10 rounded-lg grid place-content-center'>
                <svg xmlns="http://www.w3.org/2000/svg" height="32px" viewBox="0 -960 960 960" width="32px" fill={card.fillColor}>
                  <path d={card.svgPath} />
                </svg>
              </div>
              <div className='pt-2'>{card.description}</div>
            </div>
          ))}
        </div>
      </div>
    </div>
  );
};

export default IconCardSection;