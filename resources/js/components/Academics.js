import React, { useEffect, useState } from 'react';
import { createRoot } from 'react-dom/client';
import { useLanguage, LanguageProvider } from './context/LanguageProvider';

export default function Academics() {
  const { language } = useLanguage();  // Acceder al idioma seleccionado
  const [content, setContent] = useState({});  // Estado para guardar el contenido traducido

  useEffect(() => {
    // Definir los textos en ambos idiomas dentro del useEffect para actualizar cuando el idioma cambie
    const translations = {
      es: {
        title: "Conoce las academias que brindan sus servicios en el parque",
        description: "Lorem ipsum dolor sit amet consectetur. Cursus amet nunc massa aliquam malesuada. At turpis eu laoreet fames scelerisque interdum. Blandit consequat mi euismod habitant nec quis faucibus lorem. Ut eget netus metus at et enim adipiscing fermentum lectus.",
        contactText: "Contáctanos:",
        contactEmail: "studyabroad@cdspanama.org",
      },
      en: {
        title: "Learn about the academies offering their services in the park",
        description: "Lorem ipsum dolor sit amet consectetur. Cursus amet nunc massa aliquam malesuada. At turpis eu laoreet fames scelerisque interdum. Blandit consequat mi euismod habitant nec quis faucibus lorem. Ut eget netus metus at et enim adipiscing fermentum lectus.",
        contactText: "Contact us:",
        contactEmail: "studyabroad@cdspanama.org",
      },
    };

    // Actualizar el estado con el contenido traducido
    setContent(translations[language]);
  }, [language]);  // Dependencia en el idioma

  return (
    <div className='nwp-padding-x-container bg-white pb-20'>
      <div className='nwp-container mx-auto grid grid-cols-1 md:grid-cols-3 gap-y-4 lg:gap-x-8'>
        <div className=' col-span-1 h-80 md:h-[400px] w-full'>
          <img 
          className='object-cover h-full w-full'
            src='https://images.unsplash.com/photo-1663622438610-00a72c139d8c?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'>
          </img>
        </div>
        <div className=' col-span-2'>
          <h4 className='text-4xl lg:text-5xl font-bold py-4 text-black'>{content.title}</h4>
          <p className='pb-4'>{content.description}</p>
          <p>{content.contactText} <a className='text-cdsblue font-semibold underline' href='#'>{content.contactEmail}</a></p>
        </div>
      </div>
    </div>
  );
}

const container = document.getElementById('nwp-academics');
if (container) {
  const root = createRoot(container);
  root.render(
    <LanguageProvider>
      <Academics />
    </LanguageProvider>
  );
}