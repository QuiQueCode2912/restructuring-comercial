import React, { useState, useEffect, useRef } from 'react';
import { IconLanguage } from '../icons/Icons';
import { IconArrowDown } from '../icons/Icons';
import { useLanguage } from '../context/LanguageProvider';

const LanguageSelect = () => {
  const { language, setLanguage } = useLanguage(); // Corrección aquí, asumiendo que useLanguage devuelve un objeto
  const [isOpen, setIsOpen] = useState(false);
  const menuRef = useRef(null);

  const handleLanguageChange = (lang) => {
    setLanguage(lang);
    setIsOpen(false);
    window.location.reload(); // Si es necesario recargar la página
  };

  const labelButton = (language) => {
    if( language === 'es'){
      return ('ES');
    }
    if(language === 'en'){
      return ('EN');
    }
  }

  // Manejar clics fuera del menú para cerrarlo
  useEffect(() => {
    const handleClickOutside = (event) => {
      if (menuRef.current && !menuRef.current.contains(event.target)) {
        setIsOpen(false);
      }
    };
    document.addEventListener('mousedown', handleClickOutside);
    return () => {
      document.removeEventListener('mousedown', handleClickOutside);
    };
  }, []);

  return (
    <div ref={menuRef} className='flex items-center' style={{ position: 'relative', display: 'inline-block' }}>
      <div
        className='text-white font-semibold  md:ml-4 flex gap-2 cursor-pointer items-center'
        onClick={() => setIsOpen(!isOpen)}
      >
        <IconLanguage color="#fff" size="24px" rotate={0} />
        {labelButton(language)}
        <IconArrowDown
          color="#fff"
          size="20px"
          rotate={isOpen ? 180 : 0}
          className='ml-2 transition-transform duration-200 min-h-6 min-w-6'
        />
      </div>
      {isOpen && (
        <ul
          className={`absolute list-none md:-mt-1 w-[200px] rounded-lg bg-cdsgray700 font-semibold z-50 transition-opacity duration-200 opacity-100 
            ${isOpen ? 'opacity-100' : 'opacity-0'} 
             -top-32 md:top-auto md:right-0 md:bottom-[-120px]`} // Ajuste para que en móviles se abra arriba y en desktop abajo
        >
          <li>
            <div
              className='px-4 py-3 cursor-pointer hover:bg-gray-200'
              onClick={() => handleLanguageChange('es')}
            >
              Español (spanish)
            </div>
          </li>
          <li>
            <div
              className='px-4 py-3 cursor-pointer hover:bg-gray-200'
              onClick={() => handleLanguageChange('en')}
            >
              English
            </div>
          </li>
        </ul>
      )}
    </div>
  );
};

export default LanguageSelect;
