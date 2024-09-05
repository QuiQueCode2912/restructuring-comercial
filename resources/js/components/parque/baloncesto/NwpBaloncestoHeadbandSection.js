import React, { useEffect, useState } from 'react';
import { createRoot } from 'react-dom/client';
import Headband from '../../Headband';
import { useLanguage, LanguageProvider } from '../../context/LanguageProvider';

const NwpBaloncestoHeadbandSection = () => {
  const { language } = useLanguage();  // Acceder al idioma seleccionado
  const [content, setContent] = useState({});  // Estado para guardar el contenido traducido

  useEffect(() => {
    // Definir los textos en ambos idiomas dentro del useEffect para actualizar cuando el idioma cambie
    const translations = {
      es: {
        mainTitle: "Vive el campus",
        subtitle: "Un espacio para compartir, entrenar y divertirse",
        instagramLink: "https://www.instagram.com/parquecds/?hl=es",
        instagramHandle: "@parquecds",
        imageSrc: 'https://comercial.ciudaddelsaber.org/storage/venues/7a7b41702666a764ed05d401a73da351248d2577d3b5e988c513954bc39ec680_2048.jpg',
      },
      en: {
        mainTitle: "Experience the campus",
        subtitle: "A space to share, train, and have fun",
        instagramLink: "https://www.instagram.com/parquecds/?hl=en",
        instagramHandle: "@parquecds",
        imageSrc: 'https://comercial.ciudaddelsaber.org/storage/venues/7a7b41702666a764ed05d401a73da351248d2577d3b5e988c513954bc39ec680_2048.jpg',
      }
    };

    // Actualizar el estado con el contenido traducido
    setContent(translations[language]);
  }, [language]);  // Dependencia en el idioma

  return (
    <Headband 
      imageSrc={content.imageSrc}
      mainTitle={content.mainTitle}
      subtitle={content.subtitle}
      instagramLink={content.instagramLink}
      instagramHandle={content.instagramHandle}
    />
  );
}

const container = document.getElementById('nwp-baloncesto-headband-section');
if (container) {
  const root = createRoot(container);
  root.render(
    <LanguageProvider>
      <NwpBaloncestoHeadbandSection />
    </LanguageProvider>
  );
}