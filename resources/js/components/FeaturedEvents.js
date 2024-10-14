import React, { useEffect, useState } from 'react';
import { createRoot } from 'react-dom/client';
import { useLanguage, LanguageProvider } from './context/LanguageProvider';

export const FeaturedEvents = () => {
  const { language } = useLanguage();  // Acceder al idioma seleccionado
  const [content, setContent] = useState({ title: '', cards: [] });  // Estado para guardar el contenido traducido
  const [loading, setLoading] = useState(true);  // Para manejar el estado de carga

  // Función para formatear la fecha y hora en el formato "Dom 14 abril 10:00 pm"
  const formatDateAndTime = (date) => {
    const eventDate = new Date(date);
    
    const daysOfWeek = language === 'es' 
      ? ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb']
      : ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

    const months = language === 'es' 
      ? ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre']
      : ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

    const dayOfWeek = daysOfWeek[eventDate.getDay()];
    const day = eventDate.getDate();
    const month = months[eventDate.getMonth()];
    
    const optionsTime = { hour: 'numeric', minute: 'numeric', hour12: true };
    const formattedTime = eventDate.toLocaleTimeString(language === 'es' ? 'es-ES' : 'en-US', optionsTime);

    return `${dayOfWeek} ${day} ${month} ${formattedTime}`;
  };

  useEffect(() => {
    // Seleccionar la URL correcta basada en el idioma
    const apiUrl = language === 'es'
      ? 'https://backend-newsite.ciudaddelsaber.org/api/events?locale=es&populate[event_type]=tag&populate[eventOrganizer]=displayName&populate[image]=url&fields[0]=title&fields[1]=slug&fields[2]=startDate&fields[3]=endDate&fields[4]=eventValue'
      : 'https://backend-newsite.ciudaddelsaber.org/api/events?locale=en&populate[event_type]=tag&populate[eventOrganizer]=displayName&populate[image]=url&fields[0]=title&fields[1]=slug&fields[2]=startDate&fields[3]=endDate&fields[4]=eventValue';

    // Función para obtener los eventos desde la API
    const fetchEvents = async () => {
      try {
        const response = await fetch(apiUrl);
        const data = await response.json();
        
        // Procesar los datos de la API
        let events = data.data.map(event => ({
          title: event.attributes.title,
          description: '',  // Placeholder para descripción
          label: event.attributes.event_type?.data?.attributes?.tag || 'Sin categoría',
          openingTime: formatDateAndTime(event.attributes.startDate),
          closingTime: formatDateAndTime(event.attributes.endDate),
          access: event.attributes.eventValue || 'No especificado',
          activity: 'Actividad del evento',  // Placeholder, depende del dato que quieras mostrar
          organizer: event.attributes.eventOrganizer.displayName,
          dateAndTime: language === 'es' ? 'Fecha y hora' : 'Date and time',
          accessText: language === 'es' ? 'Acceso' : 'Access',
          activityText: language === 'es' ? 'Actividad' : 'Activity',
          organizerText: language === 'es' ? 'Organizado por' : 'Organized by',
          imageUrl: `https://backend-newsite.ciudaddelsaber.org${event.attributes.image?.data?.attributes?.url}` || 'default-image-url',
          link: `https://frontend-newsite.ciudaddelsaber.org/eventos/${event.attributes.slug}`,  // Puedes configurar el enlace adecuado aquí
        }));

        console.log(events);

        // Mostrar solo los 3 últimos eventos
        events = events.slice(-3);

        // Establecer los datos traducidos en el estado
        setContent({
          title: language === 'es' ? 'Eventos' : 'Events',
          moreInfoText: language === 'es' ? 'Reserva tu lugar' : 'Learn more',
          cards: events
        });
        setLoading(false);
      } catch (error) {
        console.error('Error fetching events:', error);
        setLoading(false);
      }
    };

    fetchEvents();
  }, [language]);  // Dependencia en el idioma

  if (loading) {
    return <div>Loading...</div>;  // Mostrar un mensaje de carga mientras se obtienen los datos
  }

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
                    <p className='text-base'>{card.dateAndTime}: <span className='font-semibold'>{card.openingTime}</span></p>
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
};

const container = document.getElementById('nwp-featured-events');
if (container){
  const root = createRoot(container);
  root.render(
    <LanguageProvider>
      <FeaturedEvents />
    </LanguageProvider>
  );
}
