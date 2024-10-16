import React, { useEffect, useState } from 'react';
import { createRoot } from 'react-dom/client';
import ParkActivities from '../ParkActivities';
import { LanguageProvider, useLanguage } from '../context/LanguageProvider';
import {NwpContentWithVideoSection }from '../NwpContentWithVideoSection';

export default function NwpParqueContentWithVideoSection() {
  const { language } = useLanguage(); // Acceder al idioma seleccionado
  const [content, setContent] = useState({}); // Estado para guardar el contenido traducido
  const [activities, setActivities] = useState([]); // Estado para guardar las actividades traducidas

  useEffect(() => {
    // Definir los textos en ambos idiomas dentro del useEffect para actualizar cuando el idioma cambie
    const translations = {
      es: {
        headed: "Entrada gratis",
        title: "¿Qué hacer un día en el parque?",
        content: "En el parque Ciudad del Saber, encontrarás una variedad de actividades para disfrutar. Ofrecemos opciones gratuitas y abiertas a todo el público, perfectas para compartir con tu familia, amigos y  tu mascota.",
        activities: [
          {
            iconPath: "M281.33-40 403-660.67q5.33-25.66 24.33-39.16 19-13.5 40-13.5T506.5-704q18.17 9.33 29.5 27.33l39.33 64q18.67 31 50.5 55.5 31.84 24.5 74.17 37.5v-73.66h46.67V-40H700v-411.33q-50-11-93.67-37.67-43.66-26.67-77-65.67L502-418l84.67 80.67V-40H520v-242.67l-94.67-90L352-40h-70.67Zm17-400.33L220-455q-12-2.33-20-14.17-8-11.83-5.67-24.83l30-157q5.34-30 30.67-46.5 25.33-16.5 55.33-11.17l39.34 7.67-51.34 260.67Zm235-309q-31 0-53.16-22.17Q458-793.67 458-824.67t22.17-53.16Q502.33-900 533.33-900q31 0 53.17 22.17 22.17 22.16 22.17 53.16 0 31-22.17 53.17t-53.17 22.17Z",
            text: "Recorre 2km de sendero en nuestra reserva forestal"
          },
          {
            iconPath: "M720.05-724.67q-31.05 0-53.22-22.11-22.16-22.11-22.16-53.17 0-31.05 22.11-53.22 22.11-22.16 53.17-22.16 31.05 0 53.22 22.11 22.16 22.11 22.16 53.17 0 31.05-22.11 53.22-22.11 22.16-53.17 22.16ZM666.67-80v-330.67q0-33.33-16.84-60-16.83-26.66-46.83-40L642-625q8-25 29.5-40t48.5-15q27 0 48.5 15t29.5 40l102 298.33H793.33V-80H666.67Zm-170-420q-25 0-42.5-17.5t-17.5-42.5q0-25 17.5-42.5t42.5-17.5q25 0 42.5 17.5t17.5 42.5q0 25-17.5 42.5t-42.5 17.5ZM220.05-724.67q-31.05 0-53.22-22.11-22.16-22.11-22.16-53.17 0-31.05 22.11-53.22 22.11-22.16 53.17-22.16 31.05 0 53.22 22.11 22.16 22.11 22.16 53.17 0 31.05-22.11 53.22-22.11 22.16-53.17 22.16ZM146.67-80v-286.67H80v-246.66q0-27.5 19.58-47.09Q119.17-680 146.67-680h146.66q27.5 0 47.09 19.58Q360-640.83 360-613.33v246.66h-66.67V-80H146.67ZM440-80v-166.67h-46.67v-164q0-20.55 14.39-34.94Q422.11-460 442.67-460h108q20.55 0 34.94 14.39Q600-431.22 600-410.67v164h-46.67V-80H440Z",
            text: "Diviértete en familia en el parque para niños y niñas"
          },
          {
            iconPath: "M173.24-481.67q-39.24 0-66.24-27.09-27-27.09-27-66.33 0-39.24 27.09-66.24 27.1-27 66.34-27t66.24 27.09q27 27.09 27 66.33 0 39.24-27.1 66.24-27.09 27-66.33 27Zm183.33-166.66q-39.24 0-66.24-27.1-27-27.09-27-66.33 0-39.24 27.1-66.24 27.09-27 66.33-27Q396-835 423-807.91q27 27.1 27 66.34t-27.09 66.24q-27.1 27-66.34 27Zm246.67 0q-39.24 0-66.24-27.1-27-27.09-27-66.33Q510-781 537.09-808q27.1-27 66.34-27t66.24 27.09q27 27.1 27 66.34t-27.1 66.24q-27.09 27-66.33 27Zm183.33 166.66q-39.24 0-66.24-27.09-27-27.09-27-66.33 0-39.24 27.1-66.24 27.09-27 66.33-27 39.24 0 66.24 27.09 27 27.09 27 66.33 0 39.24-27.09 66.24-27.1 27-66.34 27ZM266-75q-43 0-71.17-32.52-28.16-32.51-28.16-76.81 0-45.34 28.83-80 28.83-34.67 59.83-67.34 24.34-25 44-53.5 19.67-28.5 40.67-56.5 26.67-38 60.33-69 33.67-31 79.67-31T560-511q34 30.67 60.67 69.34 20.66 27.99 40.16 56.33 19.5 28.33 43.84 53.66 31 32.67 59.83 67.34 28.83 34.66 28.83 80 0 44.3-28.16 76.81Q737-75 694-75q-54 0-107-9t-107-9q-54 0-107 9t-107 9Z",
            text: "Disfruta de un espacio amigable en el parque para mascotas"
          },
        ],
      },
      en: {
        headed: "Free entry",
        title: "What to do on a day at the park?",
        content: "At Ciudad del Saber Park, you'll find a variety of activities to enjoy. We offer free and open options for the public, perfect for sharing with your family, friends, and even your pet.",
        activities: [
          {
            iconPath: "M281.33-40 403-660.67q5.33-25.66 24.33-39.16 19-13.5 40-13.5T506.5-704q18.17 9.33 29.5 27.33l39.33 64q18.67 31 50.5 55.5 31.84 24.5 74.17 37.5v-73.66h46.67V-40H700v-411.33q-50-11-93.67-37.67-43.66-26.67-77-65.67L502-418l84.67 80.67V-40H520v-242.67l-94.67-90L352-40h-70.67Zm17-400.33L220-455q-12-2.33-20-14.17-8-11.83-5.67-24.83l30-157q5.34-30 30.67-46.5 25.33-16.5 55.33-11.17l39.34 7.67-51.34 260.67Zm235-309q-31 0-53.16-22.17Q458-793.67 458-824.67t22.17-53.16Q502.33-900 533.33-900q31 0 53.17 22.17 22.17 22.16 22.17 53.16 0 31-22.17 53.17t-53.17 22.17Z",
            text: "Walk 2km of trail in our forest reserve"
          },
          {
            iconPath: "M720.05-724.67q-31.05 0-53.22-22.11-22.16-22.11-22.16-53.17 0-31.05 22.11-53.22 22.11-22.16 53.17-22.16 31.05 0 53.22 22.11 22.16 22.11 22.16 53.17 0 31.05-22.11 53.22-22.11 22.16-53.17 22.16ZM666.67-80v-330.67q0-33.33-16.84-60-16.83-26.66-46.83-40L642-625q8-25 29.5-40t48.5-15q27 0 48.5 15t29.5 40l102 298.33H793.33V-80H666.67Zm-170-420q-25 0-42.5-17.5t-17.5-42.5q0-25 17.5-42.5t42.5-17.5q25 0 42.5 17.5t17.5 42.5q0 25-17.5 42.5t-42.5 17.5ZM220.05-724.67q-31.05 0-53.22-22.11-22.16-22.11-22.16-53.17 0-31.05 22.11-53.22 22.11-22.16 53.17-22.16 31.05 0 53.22 22.11 22.16 22.11 22.16 53.17 0 31.05-22.11 53.22-22.11 22.16-53.17 22.16ZM146.67-80v-286.67H80v-246.66q0-27.5 19.58-47.09Q119.17-680 146.67-680h146.66q27.5 0 47.09 19.58Q360-640.83 360-613.33v246.66h-66.67V-80H146.67ZM440-80v-166.67h-46.67v-164q0-20.55 14.39-34.94Q422.11-460 442.67-460h108q20.55 0 34.94 14.39Q600-431.22 600-410.67v164h-46.67V-80H440Z",
            text: "Have fun with your family at the children's park"
          },
          {
            iconPath: "M173.24-481.67q-39.24 0-66.24-27.09-27-27.09-27-66.33 0-39.24 27.09-66.24 27.1-27 66.34-27t66.24 27.09q27 27.09 27 66.33 0 39.24-27.1 66.24-27.09 27-66.33 27Zm183.33-166.66q-39.24 0-66.24-27.1-27-27.09-27-66.33 0-39.24 27.1-66.24 27.09-27 66.33-27Q396-835 423-807.91q27 27.1 27 66.34t-27.09 66.24q-27.1 27-66.34 27Zm246.67 0q-39.24 0-66.24-27.1-27-27.09-27-66.33Q510-781 537.09-808q27.1-27 66.34-27t66.24 27.09q27 27.1 27 66.34t-27.1 66.24q-27.09 27-66.33 27Zm183.33 166.66q-39.24 0-66.24-27.09-27-27.09-27-66.33 0-39.24 27.1-66.24 27.09-27 66.33-27 39.24 0 66.24 27.09 27 27.09 27 66.33 0 39.24-27.09 66.24-27.1 27-66.34 27ZM266-75q-43 0-71.17-32.52-28.16-32.51-28.16-76.81 0-45.34 28.83-80 28.83-34.67 59.83-67.34 24.34-25 44-53.5 19.67-28.5 40.67-56.5 26.67-38 60.33-69 33.67-31 79.67-31T560-511q34 30.67 60.67 69.34 20.66 27.99 40.16 56.33 19.5 28.33 43.84 53.66 31 32.67 59.83 67.34 28.83 34.66 28.83 80 0 44.3-28.16 76.81Q737-75 694-75q-54 0-107-9t-107-9q-54 0-107 9t-107 9Z",
            text: "Enjoy a pet-friendly space at the pet park"
          },
        ],
      },
    };

    // Actualizar el estado con el contenido traducido
    setContent(translations[language]);
    setActivities(translations[language].activities);
  }, [language]); // Dependencia en el idioma

  return (
    <NwpContentWithVideoSection
      headed={content.headed}
      title={content.title}
      content={content.content}
      backgroundImage="/assets/nwp-images/parque-vista-aerea.png"
      videoUrl="https://www.youtube.com/watch?v=aRZ1W2apiDY"
      activities={activities}
    />
  );
}

const container = document.getElementById('nwp-parque-section02');
if (container) {
  const root = createRoot(container);
  root.render(
    <LanguageProvider>
      <NwpParqueContentWithVideoSection />
    </LanguageProvider>
  );
}