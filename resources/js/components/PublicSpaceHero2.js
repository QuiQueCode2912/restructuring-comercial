import React from 'react';

const PublicSpaceHero2 = ({ title, content, buttonLabel, onButtonClick, image }) => {
  return (
    <>
      <div className='md:relative nwp-padding-x-container md:h-[600px] bg-white'>
        <div className='mx-auto nwp-container md:grid md:grid-cols-2 md:h-full md:gap-x-8'>
          <div className='flex flex-col md:col-span-1 gap-y-4 justify-center md:h-full pb-20 md:pb-0 pt-20'>
            <h3 className='font-bold text-3xl md:text-4xl'>{title}</h3>
            <p className='pb-2'>{content}</p>
            <button className='font-semibold text-start flex gap-x-2 items-center' onClick={onButtonClick}>
              {buttonLabel}
              <div className="bg-cdsblue rounded-full h-8 w-8 grid place-content-center"> 
                <svg xmlns="http://www.w3.org/2000/svg" height="28px" viewBox="0 -960 960 960" width="28px" fill="#FFFFFF">
                  <path d="M480-315.33 284.67-510.67l47.33-48L446.67-444v-356h66.66v356L628-558.67l47.33 48L480-315.33ZM226.67-160q-27 0-46.84-19.83Q160-199.67 160-226.67V-362h66.67v135.33h506.66V-362H800v135.33q0 27-19.83 46.84Q760.33-160 733.33-160H226.67Z"/>
                </svg>
              </div>
            </button>
          </div>
          <div className='md:col-span-1 '></div>
        </div>
        <div className='hidden  md:absolute md:left-1/2 md:top-0 col-span-1 text-white font-bold md:grid grid-cols-1 h-[600px]'>
          <img src={image} alt="Piscina" className='w-[1200px] h-[600px] object-cover' />
        </div>
      </div>
    </>
  );
};

export default PublicSpaceHero2;
