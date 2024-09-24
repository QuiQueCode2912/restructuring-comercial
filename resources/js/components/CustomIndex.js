import React, { useEffect, useState } from 'react';
import { useLanguage } from './context/LanguageProvider';
import { IconArrowDown } from './icons/Icons';

export default function CustomIndex({ sections }) {
  const { language } = useLanguage(); // Acceder al idioma seleccionado
  const [menuOpen, setMenuOpen] = useState(false);
  const [selectedLabel, setSelectedLabel] = useState(''); // Estado para el label seleccionado
  const [isFixed, setIsFixed] = useState(false); // Estado para controlar si el menú está fijado

  useEffect(() => {
    // Establecer la primera opción como label por defecto
    setSelectedLabel(sections[language][0]?.label || '');
  }, [language, sections]);

  useEffect(() => {
    const handleScroll = () => {
      const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
      if (scrollTop >= 456) {
        setIsFixed(true); // Fija el menú cuando el scroll es mayor o igual a 456px
      } else {
        setIsFixed(false); // El menú vuelve a su posición original
      }
    };

    window.addEventListener('scroll', handleScroll);

    return () => {
      window.removeEventListener('scroll', handleScroll); // Limpia el evento de scroll
    };
  }, []);

  const handleScrollToSection = (sectionId, label) => {
    const element = document.querySelector(sectionId);
    if (element) {
      const elementPosition = element.getBoundingClientRect().top + window.pageYOffset;
      const offsetPosition = elementPosition - 100; // Ajustar el desplazamiento a 100px antes

      window.scrollTo({
        top: offsetPosition,
        behavior: 'smooth',
      });

      // Actualizar el label seleccionado
      setSelectedLabel(label);
      setMenuOpen(false); // Cerrar el menú después de seleccionar
    }
  };

  return (
    <div className={`nwp-padding-x-container bg-cdsgray700 ${isFixed ? 'fixed duration-100 transition-all top-16 md:top-[72px] left-0 right-0 z-30' : ''}`}>
      {/* Versión para móviles con Select */}
      <div className="md:hidden">
        <div className={`overflow-hidden transition-all duration-500 ease-in-out ${menuOpen ? 'max-h-96' : 'max-h-12'}`}>
          <button
            className="w-full text-left py-2 text-black focus:outline-0 font-semibold flex justify-between items-center"
            onClick={() => setMenuOpen(!menuOpen)}
          >
            {selectedLabel} {/* Mostrar el label seleccionado */}
            <IconArrowDown
              color={menuOpen ? '#0088ff' : 'black'}
              rotate={menuOpen ? 180 : 0} // Rotación en función del estado del menú
              className="transition-transform duration-300 transform min-h-8 min-w-8"
            />
          </button>
          {menuOpen && (
            <ul className="flex flex-col text-black">
              {sections[language].map(({ id, label }) => (
                <li key={id}>
                  <button
                    className="py-2 w-full text-left"
                    onClick={() => handleScrollToSection(id, label)}
                  >
                    {label}
                  </button>
                </li>
              ))}
            </ul>
          )}
        </div>
      </div>

      {/* Versión de escritorio */}
      <nav className="hidden md:block nwp-container mx-auto">
        <ul className="py-3 -ml-0 md:-ml-6 flex flex-col md:flex-row md:divide-x divide-cdsgray500 gap-y-2 md:gap-y-0">
          {sections[language].map(({ id, label }) => (
            <li key={id}>
              <button
                className="md:px-6 hover:no-underline hover:text-black font-semibold focus:outline-0"
                onClick={() => handleScrollToSection(id, label)}
              >
                {label}
              </button>
            </li>
          ))}
        </ul>
      </nav>
    </div>
  );
}
