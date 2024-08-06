import React, { useState } from 'react';
import LogoCds from '../icons/LogoCds';
import { ArrowIcon, ArrowIconRight, ArrowWhitBg, RedirectArrow } from '../icons/Arrows';
import MenuIcon, { CloseIcon } from '../icons/MenuIcon';

export default function NwpMobileHeader({ menuOptions }) {
  const [menuOpen, setMenuOpen] = useState(false);
  const [openMenuIndex, setOpenMenuIndex] = useState(null);
  const [openSubMenuIndex, setOpenSubMenuIndex] = useState(null);

  const toggleMenu = () => {
    setMenuOpen(!menuOpen);
    setOpenMenuIndex(null);
    setOpenSubMenuIndex(null);
  };

  const handleMenuClick = (index) => {
    if (openMenuIndex === index) {
      setOpenMenuIndex(null);
      setOpenSubMenuIndex(null);
    } else {
      setOpenMenuIndex(index);
      setOpenSubMenuIndex(null);
    }
  };

  const handleSubMenuClick = (index) => {
    if (openSubMenuIndex === index) {
      setOpenSubMenuIndex(null);
    } else {
      setOpenSubMenuIndex(index);
    }
  };

  return (
    <header className='fixed top-0 left-0 right-0 z-40 bg-white lg:hidden'>
      <div className='flex justify-between items-center border-b border-gray-300 py-2 px-4 h-20'>
        <div className='h-full'>
          <LogoCds className="h-12" width={170} height={60} />
        </div>
        <button onClick={toggleMenu} className='outline-none focus:outline-none'>
          {menuOpen ? (
            <CloseIcon className="h-7 w-7 text-black transition-transform duration-300 transform rotate-180" />
          ) : (
            <MenuIcon className="h-7 w-7 text-black transition-transform duration-300 transform rotate-0" />
          )}
        </button>
      </div>
      <div className={`bg-white overflow-hidden transition-max-height duration-500 ease-in-out ${menuOpen ? 'max-h-screen' : 'max-h-0'}`}>
        <div className='pt-4 flex flex-col z-50'>
          <div className='flex flex-col justify-between h-[calc(100vh-5rem)] max-h-[calc(200vh-5rem)] overflow-y-auto'>
            <ul className='flex flex-col text-semibold mx-4'>
              {menuOptions.map((option, index) => (
                <li key={index}>
                  {!option.subOptions ? (
                    <a
                      href={option.url}
                      className={`flex justify-between text-semibold items-center w-full py-2 outline-none focus:outline-none ${openMenuIndex === index ? 'text-cdsblue border-b border-gray-300' : 'text-black'}`}
                    >
                      <span className={`text-start font-semibold ${openMenuIndex === index ? 'text-cdsblue' : 'text-black'}`}>{option.label}</span>
                      {option.external && <RedirectArrow className="h-5 w-5 ml-2" />}
                    </a>
                  ) : (
                    <button
                      className={`flex justify-between text-semibold items-center w-full py-2 outline-none focus:outline-none ${openMenuIndex === index ? 'text-cdsblue border-b border-gray-300' : 'text-black'}`}
                      onClick={() => handleMenuClick(index)}
                    >
                      <span className={`text-start font-semibold ${openMenuIndex === index ? 'text-cdsblue' : 'text-black'}`}>{option.label}</span>
                      <ArrowIcon color={`${openMenuIndex === index ? '#0088ff' : 'black'}`} rotate={openMenuIndex === index} />
                    </button>
                  )}
                  <div className={`overflow-hidden transition-max-height duration-500 ease-in-out ${openMenuIndex === index ? 'max-h-screen' : 'max-h-0'}`}>
                    {option.subOptions && (
                      <ul className='bg-white py-2 border-b border-gray-300'>
                        {option.subOptions.map((subOption, subIndex) => (
                          <li key={subIndex}>
                            {!subOption.subOptions ? (
                              <a
                                href={subOption.url}
                                className={`flex justify-between text-semibold items-center w-full py-2 px-4 outline-none focus:outline-none ${openSubMenuIndex === subIndex ? 'text-black' : 'text-black'}`}
                              >
                                <span className={`text-start font-semibold ${openSubMenuIndex === subIndex ? 'text-cdsblue' : 'text-black'}`}>{subOption.label}</span>
                                {subOption.external && <RedirectArrow className="h-5 w-5 ml-2" />}
                              </a>
                            ) : (
                              <button
                                className={`flex justify-between text-semibold items-center w-full py-2 px-4 outline-none focus:outline-none ${openSubMenuIndex === subIndex ? 'text-black' : 'text-black'}`}
                                onClick={() => handleSubMenuClick(subIndex)}
                              >
                                <span className={`text-start font-semibold ${openSubMenuIndex === subIndex ? 'text-cdsblue' : 'text-black'}`}>{subOption.label}</span>
                                <ArrowIcon color={`${openSubMenuIndex === subIndex ? '#0088ff' : 'black'}`} rotate={openSubMenuIndex === subIndex} />
                              </button>
                            )}
                            <div className={`overflow-hidden transition-max-height duration-500 ease-in-out ${openSubMenuIndex === subIndex ? 'max-h-screen' : 'max-h-0'}`}>
                              {subOption.subOptions && (
                                <ul className='bg-gray-100'>
                                  {subOption.subOptions.map((subSubOption, subSubIndex) => (
                                    <li key={subSubIndex}>
                                      {!subSubOption.subOptions ? (
                                        <a href={subSubOption.url} className={`text-start px-4 text-gray-800 flex items-center justify-between ${subSubOption.arrow ? 'h-[72px]' : 'h-12'}`}>
                                          <div className="flex items-center h-full">
                                            {subSubOption.label}
                                            {subSubOption.arrow && (
                                              <div className="h-8 w-8 ml-2 bg-cdsblue rounded-full grid place-content-center">
                                                <ArrowWhitBg className="h-6 w-6" />
                                              </div>
                                            )}
                                            {subSubOption.external && <RedirectArrow className="h-5 w-5 ml-2" />}
                                          </div>
                                        </a>
                                      ) : (
                                        <button className='text-start block py-2 px-4 text-gray-800 flex items-center justify-between'>
                                          <div className="flex items-center">
                                            {subSubOption.label}
                                            <ArrowIconRight color={`${openSubMenuIndex === subSubIndex ? '#0088ff' : 'black'}`} rotate={openSubMenuIndex === subSubIndex} />
                                          </div>
                                        </button>
                                      )}
                                    </li>
                                  ))}
                                </ul>
                              )}
                            </div>
                          </li>
                        ))}
                      </ul>
                    )}
                  </div>
                </li>
              ))}
            </ul>

            <ul className='flex flex-col gap-y-4 bg-cdsblue text-semibold px-4 pb-8 pt-6 h-68 w-full'>
              <li className='w-full'>
                <a className='text-white py-2 font-semibold w-full' href='#'>Directorio</a>
              </li >
              <li className='w-full'>
                <a className='text-white py-2 font-semibold w-full' href='#'>Noticias</a>
              </li>
              <li className='w-full'>
                <a className='text-white py-2 font-semibold w-full' href='#'>Oportunidades</a>
              </li>
              <li className='w-full border-y border-white py-2'>
                <a className='text-white font-semibold w-full' href='#'>Portal de clientes</a>
              </li>
              <li className='w-full'>
                <a className='text-white py-2 font-semibold w-full' href='#'>Idioma</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </header>
  );
}