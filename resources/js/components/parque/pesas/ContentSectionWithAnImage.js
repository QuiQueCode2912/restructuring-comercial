import React, { useEffect, useState } from 'react';
import { createRoot } from 'react-dom/client';
import {NwpContentSectionWithAnImage} from '../../NwpContentSectionWithAnImage';
import { LanguageProvider, useLanguage } from '../../context/LanguageProvider';

export default function ContentSectionWithAnImage() {
  const { language } = useLanguage();  // Acceder al idioma seleccionado
  const [content, setContent] = useState({});  // Estado para guardar el contenido traducido

  useEffect(() => {
    // Definir los textos en ambos idiomas dentro del useEffect para actualizar cuando el idioma cambie
    const translations = {
      es: {
        title: "Conoce nuestras instalaciones y área de pesas",
        content: `Conoce nuestras instalaciones y el área de pesas, diseñadas en tu comunidad y  bienestar.Aquí encontrarás una amplia variedad de equipos de última generación, desde máquinas de pesas hasta pesos libres, todo en un ambiente amigable y motivador. 
                  Ya seas principiante o experimentado, nuestro espacio está preparado para adaptarse a tus necesidades. Además, contarás con el apoyo de entrenadores calificados que te guiarán en tu rutina. `,
        buttonLabel: "Ver el reglamento de uso",
        modalTitle: "Reglamentos de uso del Parque Ciudad del Saber",
        modalDesc: (
          <ol className="list-decimal list-inside">
            <li>No se permite el consumo y venta de bebidas alcohólicas.</li>
            <li>No se permite la venta de comida y bebidas (sodas, aguas, bebidas energizantes, etc.).</li>
            <li>No se permite fumar.</li>
            <li>Cumplir con el uso apropiado de los estacionamientos. No se pueden estacionar en los laterales de la vía principal del Parque.</li>
            <li>No se permite el uso de murgas, troneras, parlantes, bocinas, micrófonos y otros instrumentos de ruido excesivo.</li>
            <li>Se le solicita depositar los desechos de basura que se produzcan durante el uso de la instalación en los cestos de basura. Se le hará un cargo de B/. 100.00 en caso de encontrar algún tipo de desecho en el área asignada.</li>
            <li>LA FUNDACIÓN por condiciones climatológicas se reserva el derecho de uso de las instalaciones para preservar el buen estado de estas.</li>
            <li>LA FUNDACIÓN no se hará responsable por la pérdida de objetos de valor (prendas, celulares, equipos deportivos, etc.) durante el desarrollo de las actividades.</li>
            <li>El Cliente exonera a LA FUNDACIÓN de cualquier imprevisto, lesión o accidente que ocurra con algún participante durante las actividades del evento.</li>
            <li>Respetar y obedecer las instrucciones del personal del Parque Ciudad del Saber y agentes de Seguridad de CdS.</li>
            <li>Se prohíben los actos de violencia, riña y palabras ofensivas durante las actividades. De ocurrir algunos de estos hechos, El Cliente deberá expulsar al equipo o persona que incurrió en la falta y, de tratarse de la barra, esta deberá abandonar las instalaciones.</li>
          </ol>
        ),
      },
      en: {
        title: "Ciudad del Saber Park Regulations",
        content: `Ciudad del Saber Park provides a safe and enjoyable environment for all visitors. 
                  Please follow the regulations to ensure a positive experience for everyone.`,
        buttonLabel: "Download the usage rules",
        modalTitle: "Ciudad del Saber Park Usage Regulations",
        modalDesc: (
          <ol className="list-decimal list-inside">
            <li>The consumption and sale of alcoholic beverages are not allowed.</li>
            <li>The sale of food and beverages (sodas, water, energy drinks, etc.) is not allowed.</li>
            <li>Smoking is not allowed.</li>
            <li>Use parking areas properly. Parking on the sides of the main road of the Park is not allowed.</li>
            <li>The use of loud instruments (murgas, drums, speakers, horns, microphones, etc.) is not allowed.</li>
            <li>Please dispose of any trash generated during the use of the facility in the trash bins. A charge of B/. 100.00 will be applied if any type of waste is found in the assigned area.</li>
            <li>LA FUNDACIÓN reserves the right to close facilities due to weather conditions to preserve their condition.</li>
            <li>LA FUNDACIÓN is not responsible for the loss of valuable items (jewelry, phones, sports equipment, etc.) during activities.</li>
            <li>The client releases LA FUNDACIÓN from any unforeseen events, injuries, or accidents involving participants during activities.</li>
            <li>Respect and follow the instructions of Ciudad del Saber Park staff and Security agents.</li>
            <li>Violence, fighting, and offensive language are prohibited during activities. If any such incidents occur, the client must remove the offending team or person, and in the case of spectators, they must leave the premises.</li>
          </ol>
        ),
      },
    };
  
    // Actualizar el estado con el contenido traducido
    setContent(translations[language]);
  }, [language]);  // Dependencia en el idioma

  const handleButtonClick = () => {
    console.log('Button clicked');
  };

  return (
    <NwpContentSectionWithAnImage
      title={content.title}
      content={content.content}
      buttonLabel={content.buttonLabel}
      modalTitle={content.modalTitle}
      modalDesc={content.modalDesc}
      onButtonClick={handleButtonClick}
      image="https://plus.unsplash.com/premium_photo-1722686516461-46770349c814?q=80&w=1964&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
    />
  );
}

const container = document.getElementById('nwp-pesas-content-section-whith-an-image');
if (container) {
  const root = createRoot(container);
  root.render(
    <LanguageProvider>
      <ContentSectionWithAnImage />
    </LanguageProvider>
  );
}
