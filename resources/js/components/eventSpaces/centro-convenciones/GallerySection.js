import React, { useEffect, useState } from 'react';
import { createRoot } from 'react-dom/client';
import { LanguageProvider, useLanguage } from '../../context/LanguageProvider';
import { NwpGallerySection } from '../../NwpGallerySection'; // Importar el componente GallerySection

export const GallerySection = () => {
  const { language } = useLanguage(); // Acceder al idioma seleccionado
  const [content, setContent] = useState({}); // Estado para guardar el contenido traducido
  const [carouselImages, setCarouselImages] = useState([]); // Estado para guardar las imágenes traducidas del carrusel

  useEffect(() => {
    // Definir los textos en ambos idiomas dentro del useEffect para actualizar cuando el idioma cambie
    const translations = {
      es: {
        title: "Explora el Ateneo",
        carouselImages: [
          {
            image: "https://plus.unsplash.com/premium_photo-1722686516461-46770349c814?q=80&w=1364&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
            title: "Imagen 1",
            description: "Descripción de la imagen 1"
          },
          {
            image: "https://plus.unsplash.com/premium_photo-1722686516461-46770349c814?q=80&w=1364&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
            title: "Imagen 2",
            description: "Descripción de la imagen 2"
          },
          {
            image: "https://plus.unsplash.com/premium_photo-1722686516461-46770349c814?q=80&w=1364&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
            title: "Imagen 1",
            description: "Descripción de la imagen 1"
          },
          {
            image: "https://plus.unsplash.com/premium_photo-1722686516461-46770349c814?q=80&w=1364&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
            title: "Imagen 2",
            description: "Descripción de la imagen 2"
          },
          {
            image: "https://plus.unsplash.com/premium_photo-1722686516461-46770349c814?q=80&w=1364&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
            title: "Imagen 2",
            description: "Descripción de la imagen 2"
          },
        ],
      },
      en: {
        title: "Explore our pool",
        carouselImages: [
          {
            image: "https://plus.unsplash.com/premium_photo-1722686516461-46770349c814?q=80&w=1364&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
            title: "Imagen 1",
            description: "Descripción de la imagen 1"
          },
          {
            image: "https://plus.unsplash.com/premium_photo-1722686516461-46770349c814?q=80&w=1364&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
            title: "Imagen 2",
            description: "Descripción de la imagen 2"
          },
          {
            image: "https://plus.unsplash.com/premium_photo-1722686516461-46770349c814?q=80&w=1364&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
            title: "Imagen 1",
            description: "Descripción de la imagen 1"
          },
          {
            image: "https://plus.unsplash.com/premium_photo-1722686516461-46770349c814?q=80&w=1364&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
            title: "Imagen 2",
            description: "Descripción de la imagen 2"
          },
          {
            image: "https://plus.unsplash.com/premium_photo-1722686516461-46770349c814?q=80&w=1364&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
            title: "Imagen 2",
            description: "Descripción de la imagen 2"
          },
        ],
      },
    };

    // Actualizar el estado con el contenido traducido
    setContent(translations[language]);
    setCarouselImages(translations[language].carouselImages);
  }, [language]); // Dependencia en el idioma

  return (
    <NwpGallerySection 
      backgroundImage="https://plus.unsplash.com/premium_photo-1722686516461-46770349c814?q=80&w=1364&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" // Imagen de fondo
      title={content.title} // Título traducido
      carouselImages={carouselImages} // Imágenes del carrusel traducidas
    />
  );
}

const container = document.getElementById('nwp-centro-convenciones-gallery-section');
if (container) {
  const root = createRoot(container);
  root.render(
    <LanguageProvider>
      <GallerySection />
    </LanguageProvider>
  );
}
