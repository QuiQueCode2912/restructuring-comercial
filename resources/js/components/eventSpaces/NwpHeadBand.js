import React, { useEffect, useState } from 'react';
import { createRoot } from 'react-dom/client';
import Headband from '../Headband';
import { useLanguage, LanguageProvider } from '../context/LanguageProvider';

export default function NwpHeadBand() {
  const { language } = useLanguage();  // Acceder al idioma seleccionado
  const [content, setContent] = useState({});  // Estado para guardar el contenido traducido

  useEffect(() => {
    // Definir los textos en ambos idiomas dentro del useEffect para actualizar cuando el idioma cambie
    const translations = {
      es: {
        mainTitle: "Transformamos barracas por aulas",
        subtitle: "Conecta con nuestra comunidad innovadora",
        instagramLink: "https://www.instagram.com/parquecds/?hl=es",
        instagramHandle: "@parquecds",
        imageSrc: 'https://comercial.ciudaddelsaber.org/storage/venues/7a7b41702666a764ed05d401a73da351248d2577d3b5e988c513954bc39ec680_2048.jpg',
        backgroundColorClass: 'bg-verde-oscuro-campus',
      },
      en: {
        mainTitle: "We transform barracks into classrooms",
        subtitle: "Connect with our innovative community",
        instagramLink: "https://www.instagram.com/parquecds/?hl=en",
        instagramHandle: "@parquecds",
        imageSrc: 'https://comercial.ciudaddelsaber.org/storage/venues/7a7b41702666a764ed05d401a73da351248d2577d3b5e988c513954bc39ec680_2048.jpg',
        backgroundColorClass: 'bg-verde-oscuro-campus',
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
      backgroundColorClass={content.backgroundColorClass}
    />
  );
}

const container = document.getElementById('nwp-event-spaces-headband');
if (container) {
  const root = createRoot(container);
  root.render(
    <LanguageProvider>
      <NwpHeadBand />
    </LanguageProvider>
  );
}