import React, { useEffect, useState } from 'react';
import { useLanguage } from './context/LanguageProvider';

export default function CustomIndex({ sections }) {
  const { language } = useLanguage(); // Acceder al idioma seleccionado
  const [labels, setLabels] = useState({});

  useEffect(() => {
    // Traducciones según el idioma
    const translations = {
      es: {
        tenEnCuenta: 'Ten en cuenta',
        reservas: 'Reservas',
        facilidades: 'Facilidades del campus',
        historia: 'Historia',
        preguntasFrecuentes: 'Preguntas frecuentes',
      },
      en: {
        tenEnCuenta: 'Take into account',
        reservas: 'Reservations',
        facilidades: 'Campus Facilities',
        historia: 'History',
        preguntasFrecuentes: 'FAQs',
      },
    };

    setLabels(translations[language]);
  }, [language]);

  const handleScroll = (sectionId) => {
    const element = document.querySelector(sectionId);
    if (element) {
      const elementPosition = element.getBoundingClientRect().top + window.pageYOffset;
      const offsetPosition = elementPosition - 100; // Ajustar el desplazamiento a 40px antes

      window.scrollTo({
        top: offsetPosition,
        behavior: 'smooth',
      });
    }
  };

  return (
    <div className='nwp-padding-x-container bg-cdsgray700'>
      <nav className="nwp-container mx-auto">
        <ul className="py-3 -ml-0 md:-ml-6 flex flex-col md:flex-row md:divide-x divide-cdsgray500 gap-y-2 md:gap-y-0">
          <li>
            <button
              className="md:px-6 hover:no-underline hover:text-black font-semibold focus:outline-0"
              onClick={() => handleScroll(sections.tenEnCuenta)}
            >
              {labels.tenEnCuenta}
            </button>
          </li>
          <li>
            <button
              className="md:px-6 hover:no-underline hover:text-black font-semibold focus:outline-0"
              onClick={() => handleScroll(sections.reservas)}
            >
              {labels.reservas}
            </button>
          </li>
          <li>
            <button
              className="md:px-6 hover:no-underline hover:text-black font-semibold focus:outline-0"
              onClick={() => handleScroll(sections.facilidades)}
            >
              {labels.facilidades}
            </button>
          </li>
          <li>
            <button
              className="md:px-6 hover:no-underline hover:text-black font-semibold focus:outline-0"
              onClick={() => handleScroll(sections.historia)}
            >
              {labels.historia}
            </button>
          </li>
          <li>
            <button
              className="md:px-6 hover:no-underline hover:text-black font-semibold focus:outline-0"
              onClick={() => handleScroll(sections.preguntasFrecuentes)}
            >
              {labels.preguntasFrecuentes}
            </button>
          </li>
        </ul>
      </nav>
    </div>
  );
}