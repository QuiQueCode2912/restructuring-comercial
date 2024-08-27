import React, { useState } from 'react';
import { ArrowIcon } from './icons/Arrows';

export default function Faq({ faqTitle, faqItems = [] }) {
  const [activeIndex, setActiveIndex] = useState(null);

  const toggleAccordion = (index) => {
    setActiveIndex(activeIndex === index ? null : index);
  };

  return (
    <div className='nwp-padding-x-container bg-white'>
      <div className='nwp-container mx-auto py-20'>
        <div className='max-w-[750px] mx-auto'>
          <h6 className=' text-3xl md:text-5xl font-bold text-black text-center'>{faqTitle}</h6>
          <div className=" mt-8">
            <div className="accordion">
              {faqItems.map((item, index) => (
                <div className="accordion-item border-b border-gray-300" key={index}>
                  <button 
                    className={`w-full font-bold text-left py-4  flex justify-between items-center focus:outline-none ${activeIndex === index ? 'text-cdsblue' : 'text-gray-800'}`}
                    aria-expanded={activeIndex === index}
                    onClick={() => toggleAccordion(index)}
                  >
                    <span className="accordion-title">{item.title}</span>
                    <ArrowIcon 
                      color={activeIndex === index ? '#0088ff' : '#000'} 
                      className='w-8 h-8 group-hover:fill-cdsblue' 
                      rotate={activeIndex === index} 
                    />
                  </button>
                  <div className={`accordion-content ${activeIndex === index ? 'opacity-100 max-h-screen py-2' : 'opacity-0 max-h-0'} overflow-hidden transition-all duration-200`}>
                    <p className="text-gray-600">{item.content}</p>
                  </div>
                </div>
              ))}
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}