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

  return (
    <div className='nwp-padding-x-container bg-cdsgray700'>
      <nav className="nwp-container mx-auto">
        <ul className="py-3 -ml-0 md:-ml-6 flex flex-col md:flex-row md:divide-x divide-cdsgray500 gap-y-2 md:gap-y-0">
          <li>
            <a className="md:px-6 hover:no-underline hover:text-black font-semibold" href={sections.tenEnCuenta}>
              {labels.tenEnCuenta}
            </a>
          </li>
          <li>
            <a className="md:px-6 hover:no-underline hover:text-black font-semibold" href={sections.reservas}>
              {labels.reservas}
            </a>
          </li>
          <li>
            <a className="md:px-6 hover:no-underline hover:text-black font-semibold" href={sections.facilidades}>
              {labels.facilidades}
            </a>
          </li>
          <li>
            <a className="md:px-6 hover:no-underline hover:text-black font-semibold" href={sections.historia}>
              {labels.historia}
            </a>
          </li>
          <li>
            <a className="md:px-6 hover:no-underline hover:text-black font-semibold" href={sections.preguntasFrecuentes}>
              {labels.preguntasFrecuentes}
            </a>
          </li>
        </ul>
      </nav>
    </div>
  );
}