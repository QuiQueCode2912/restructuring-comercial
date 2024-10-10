import React, { useEffect, useState } from 'react';
import { createRoot } from 'react-dom/client';
import {NwpFaq} from '../../NwpFaq';
import { useLanguage, LanguageProvider } from '../../context/LanguageProvider';

export const Faq = () => {
  const { language } = useLanguage();  // Acceder al idioma seleccionado
  const [content, setContent] = useState({});  // Estado para guardar el contenido traducido

  useEffect(() => {
    // Definir los textos en ambos idiomas dentro del useEffect para actualizar cuando el idioma cambie
    const translations = {
      es: {
        faqTitle: "Preguntas frecuentes",
        faqItems: [
          { title: '¿Por qué a veces la luna está visible durante el día?', content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.' },
          { title: '¿Por qué el cielo es azul?', content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.' },
          { title: '¿Descubriremos alguna vez extraterrestres?', content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.' },
          { title: '¿Cuánto pesa la Tierra?', content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.' },
          { title: '¿Cómo se mantienen los aviones en el aire?', content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.' }
        ]
      },
      en: {
        faqTitle: "Frequently Asked Questions about Ciudad del Saber Park",
        faqItems: [
          { title: 'Why is the moon sometimes out during the day?', content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.' },
          { title: 'Why is the sky blue?', content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.' },
          { title: 'Will we ever discover aliens?', content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.' },
          { title: 'How much does the Earth weigh?', content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.' },
          { title: 'How do airplanes stay up?', content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.' }
        ]
      }
    };
    
    // Actualizar el estado con el contenido traducido
    setContent(translations[language]);
  }, [language]);  // Dependencia en el idioma


  return (
    <div className="App">
      <NwpFaq 
        faqTitle={content.faqTitle}
        faqItems={content.faqItems}
      />
    </div>
  );
}



const container = document.getElementById('nwp-golf-faq-section');
if (container){
  const root = createRoot(container);
  root.render(
    <LanguageProvider>
      <Faq />
    </LanguageProvider>
  );
}