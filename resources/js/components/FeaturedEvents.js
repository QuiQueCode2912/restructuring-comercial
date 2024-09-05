import React, { useEffect, useState } from 'react';
import { createRoot } from 'react-dom/client';
import { useLanguage, LanguageProvider } from './context/LanguageProvider';

export const FeaturedEvents = () => {
  const { language } = useLanguage();  // Acceder al idioma seleccionado
  const [content, setContent] = useState({});  // Estado para guardar el contenido traducido

  useEffect(() => {
    // Definir los textos en ambos idiomas dentro del useEffect para actualizar cuando el idioma cambie
    const translations = {
      es: {
        title: "Eventos",
        moreInfoText: "Reserva tu lugar",
        cards: [
          {
            title: "Feroz Craft Brewery",
            description: "Descubre sabores únicos, con amigos, después del trabajo",
            label: "Cultura y comunidad",
            openingTime: "7:30 PM",
            closingTime: "9:00 PM",
            access: "Entrada libre",
            activity: "Degustación de cervezas artesanales",
            organizer: "Cervecería Feroz",
            dateAndTime: "Fecha y hora", // Agregado
            accessText: "Acceso", // Agregado
            activityText: "Actividad", // Agregado
            organizerText: "Organizado por", // Agregado
            imageUrl: "https://images.unsplash.com/photo-1663622438610-00a72c139d8c?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
            link: "#"
          },
          {
            title: "Clayton Bowling",
            description: "Regresa en el tiempo y diviértete con familia y amigos",
            label: "Cultura y comunidad",
            openingTime: "7:30 PM",
            closingTime: "9:00 PM",
            access: "Entrada con reserva",
            activity: "Juego de bolos clásico",
            organizer: "Bowling de Clayton",
            dateAndTime: "Fecha y hora", // Agregado
            accessText: "Acceso", // Agregado
            activityText: "Actividad", // Agregado
            organizerText: "Organizado por", // Agregado
            imageUrl: "https://images.unsplash.com/photo-1542744173-8e7e53415bb0?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
            link: "#"
          },
          {
            title: "Noche Retro",
            description: "Viaja al pasado con música y entretenimiento clásico",
            label: "Cultura y comunidad",
            openingTime: "8:00 PM",
            closingTime: "11:00 PM",
            access: "Entrada con boletos",
            activity: "Fiesta temática retro",
            organizer: "Club Retro",
            dateAndTime: "Fecha y hora", // Agregado
            accessText: "Acceso", // Agregado
            activityText: "Actividad", // Agregado
            organizerText: "Organizado por", // Agregado
            imageUrl: "https://images.unsplash.com/photo-1542744173-8e7e53415bb0?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
            link: "#"
          }
        ]
      },
      en: {
        title: "Events",
        moreInfoText: "Learn more",
        cards: [
          {
            title: "Feroz Craft Brewery",
            description: "Discover unique flavors, with friends, after work",
            label: "Cultura y comunidad",
            openingTime: "7:30 PM",
            closingTime: "9:00 PM",
            access: "Free entrance",
            activity: "Craft beer tasting",
            organizer: "Feroz Brewery",
            dateAndTime: "Date and time", // Agregado
            accessText: "Access", // Agregado
            activityText: "Activity", // Agregado
            organizerText: "Organized by", // Agregado
            imageUrl: "https://images.unsplash.com/photo-1663622438610-00a72c139d8c?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
            link: "#"
          },
          {
            title: "Clayton Bowling",
            description: "Step back in time and have fun with family and friends",
            label: "Cultura y comunidad",
            openingTime: "7:30 PM",
            closingTime: "9:00 PM",
            access: "Reservation required",
            activity: "Classic bowling game",
            organizer: "Clayton Bowling",
            dateAndTime: "Date and time", // Agregado
            accessText: "Access", // Agregado
            activityText: "Activity", // Agregado
            organizerText: "Organized by", // Agregado
            imageUrl: "https://images.unsplash.com/photo-1542744173-8e7e53415bb0?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
            link: "#"
          },
          {
            title: "Retro Night",
            description: "Travel back in time with classic music and entertainment",
            label: "Cultura y comunidad",
            openingTime: "8:00 PM",
            closingTime: "11:00 PM",
            access: "Ticketed entrance",
            activity: "Retro-themed party",
            organizer: "Retro Club",
            dateAndTime: "Date and time", // Agregado
            accessText: "Access", // Agregado
            activityText: "Activity", // Agregado
            organizerText: "Organized by", // Agregado
            imageUrl: "https://images.unsplash.com/photo-1542744173-8e7e53415bb0?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
            link: "#"
          }
        ]
      }
    };

    // Actualizar el estado con el contenido traducido
    setContent(translations[language]);
  }, [language]);  // Dependencia en el idioma

  return (
    <div className='nwp-padding-x-container bg-white pb-20'>
      <div className='nwp-container mx-auto'>
        <h4 className='text-4xl lg:text-5xl font-bold pb-14 text-black'>{content.title}</h4>
        <div className='grid grid-cols-1 md:grid-cols-3 gap-8'>
          {content.cards && content.cards.map((card, index) => (
            <div key={index} className='relative h-[400px] w-full overflow-hidden group'>
              <a href={card.link} className='block h-full w-full'>
                <div 
                  className="h-full w-full bg-center transition-transform duration-300 ease-in-out transform group-hover:scale-105"
                  style={{ backgroundImage: `url(${card.imageUrl})`, backgroundSize: 'cover' }}
                >
                </div>
                <div className={`absolute inset-0 bg-gradient-to-t from-black via-[rgba(0,0,0,0.6)] to-transparent border-t-0 p-6 flex flex-col gap-y-4 justify-between text-white`}>
                  <div>
                    <p className='inline-block rounded-full px-4 py-2 uppercase font-semibold text-base bg-black bg-opacity-75'>{card.label}</p>
                  </div>
                  <div className='flex flex-col gap-y-2'>
                    <p className='text-2xl font-bold'>{card.title}</p>
                    <p className='text-base'>{card.dateAndTime}: <span className='font-semibold'>{card.openingTime} - {card.closingTime}</span></p>
                    <p className='text-base'>{card.accessText}: <span className='font-semibold'>{card.access}</span></p>
                    <p className='text-base'>{card.activityText}: <span className='font-semibold'>{card.activity}</span></p>
                    <p className='text-base'>{card.organizerText}: <span className='font-semibold'>{card.organizer}</span></p>
                    <div className="font-semibold hover:no-underline group-hover:text-white flex gap-x-2 items-center">
                      {content.moreInfoText}
                      <div className="h-8 w-8 bg-white rounded-full grid place-content-center transition-all duration-150 ease-in-out text-black group-hover:translate-x-1">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="32px" fill="currentColor"><path d="M673-446.67H160v-66.66h513l-240-240L480-800l320 320-320 320-47-46.67 240-240Z"/></svg>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          ))}
        </div>
      </div>
    </div>
  );
}

const container = document.getElementById('nwp-featured-events');
if (container){
  const root = createRoot(container);
  root.render(
    <LanguageProvider>
      <FeaturedEvents />
    </LanguageProvider>
  );
}