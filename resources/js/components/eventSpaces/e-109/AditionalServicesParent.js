import React, { useEffect, useState } from 'react';
import { createRoot } from 'react-dom/client';
import { LanguageProvider, useLanguage } from '../../context/LanguageProvider';
import { AditionalServicesChild } from '../../AditionalServicesChild';

export default function AditionalServicesParent() {
  const { language } = useLanguage(); // Acceder al idioma seleccionado
  const [content, setContent] = useState({}); // Estado para guardar el contenido traducido

  useEffect(() => {
    // Definir los textos en ambos idiomas dentro del useEffect para actualizar cuando el idioma cambie
    const translations = {
      es: {
        services: [
          {
            id: 1,
            title: "Catering para eventos",
            description: "Servicio de catering para eventos, excelente calidad.",
            modalTitle: "Catering para eventos",
            modalDesc: "Detalles completos sobre el servicio de catering para eventos.",
            image: "https://plus.unsplash.com/premium_photo-1722686516461-46770349c814?q=80&w=1964&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
          },
          {
            id: 2,
            title: "Alquiler de equipos",
            description: "Ofrecemos equipos para eventos.",
            modalTitle: "Alquiler de equipos",
            modalDesc: "Detalles sobre el alquiler de equipos disponibles.",
            image: "https://plus.unsplash.com/premium_photo-1722686516461-46770349c814?q=80&w=1964&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
          },
          {
            id: 3,
            title: "Servicios de decoración",
            description: "Decoración personalizada para eventos.",
            modalTitle: "Servicios de decoración",
            modalDesc: "Información sobre los servicios de decoración para eventos.",
            image: "https://plus.unsplash.com/premium_photo-1722686516461-46770349c814?q=80&w=1964&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
          },
        ],
      },
      en: {
        services: [
          {
            id: 1,
            title: "Event Catering",
            description: "Catering service for events, excellent quality.",
            modalTitle: "Event Catering",
            modalDesc: "Complete details about catering services for events.",
            image: "https://plus.unsplash.com/premium_photo-1722686516461-46770349c814?q=80&w=1964&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
          },
          {
            id: 2,
            title: "Equipment Rental",
            description: "We offer equipment for events.",
            modalTitle: "Equipment Rental",
            modalDesc: "Details about available equipment rental services.",
            image: "https://plus.unsplash.com/premium_photo-1722686516461-46770349c814?q=80&w=1964&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
          },
          {
            id: 3,
            title: "Decoration Services",
            description: "Personalized decoration for events.",
            modalTitle: "Decoration Services",
            modalDesc: "Information about decoration services for events.",
            image: "https://plus.unsplash.com/premium_photo-1722686516461-46770349c814?q=80&w=1964&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
          },
        ],
      },
    };

    // Actualizar el estado con el contenido traducido
    setContent(translations[language]);
  }, [language]); // Dependencia en el idioma

  return (
    <div className='nwp-padding-x-container bg-black'>
      <div className='nwp-container mx-auto text-white py-20 flex flex-col gap-y-8'>
        <div className='flex flex-col gap-y-6'>
          <div className='h-1 w-20 bg-cdsblue rounded-full'></div>
          <h6 className='text-3xl md:text-5xl font-bold'>Servicios adicionales ateneo</h6>
          <p className='text-lg w-full md:w-2/3'>Lorem ipsum dolor sit amet consectetur. Rhoncus egestas sed sollicitudin vel commodo pharetra consequat. Sem libero habitasse in ultrices amet sed tempor sed vitae mi id molestie proin ac sollicitudin</p>
        </div>
        {content.services && content.services.map((service) => (
          <AditionalServicesChild
            key={service.id}
            title={service.title}
            description={service.description}
            modalTitle={service.modalTitle}
            modalDesc={service.modalDesc}
            image={service.image} // Pasar la imagen como prop
          />
        ))}
      </div>
    </div>
  );
}

const container = document.getElementById('nwp-e-109-aditional-services');
if (container) {
  const root = createRoot(container);
  root.render(
    <LanguageProvider>
      <AditionalServicesParent />
    </LanguageProvider>
  );
}