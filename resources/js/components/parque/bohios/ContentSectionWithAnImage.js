import React, { useEffect, useState } from 'react';
import { createRoot } from 'react-dom/client';
import { NwpContentSectionWithAnImage } from '../../NwpContentSectionWithAnImage';
import { LanguageProvider, useLanguage } from '../../context/LanguageProvider';

export default function ContentSectionWithAnImage() {
  const { language } = useLanguage();  // Acceder al idioma seleccionado
  const [content, setContent] = useState({});  // Estado para guardar el contenido traducido

  useEffect(() => {
    // Definir los textos en ambos idiomas dentro del useEffect para actualizar cuando el idioma cambie
    const translations = {
      es: {
        title: "Disfruta de espacios para tus eventos y actividades al aire libre",
        content: `¡Descubre nuestros gazebos al aire libre en el área del parque, un espacio ideal para relajarte y disfrutar de la naturaleza! Aquí puedes organizar un picnic con amigos, celebrar un cumpleaños o simplemente disfrutar con tu familia un momento diferente.
                  Con su diseño acogedor y rodeados de hermosos paisajes, nuestros gazebos son el lugar perfecto para compartir momentos especiales.
                  Ven y aprovecha este rincón encantador, donde la tranquilidad y la diversión se unen en un solo lugar. `,
        buttonLabel: "Descarga el reglamento de uso",
        modalTitle: "Reglamentos de uso de Gazebos",
        modalDesc: (
          <ol className="list-decimal list-inside">
            <li>Aplican todos los reglamentos de uso del Parque Ciudad del Saber.</li>
            <li>No se permite juegos acuáticos ni granja de animales.</li>
            <li>No se permite el uso de barbacoas. Todos los alimentos deben venir preparados.</li>
            <li>Si desea traer inflables o trampolines, debe proporcionar su propio generador de energía (planta eléctrica).</li>
            <li>Si no cumple con la cantidad de personas estipuladas de los gazebos, el Parque Ciudad del Saber podrá proceder con la cancelación de su actividad por incumplimiento.</li>
            <li>La FUNDACIÓN, por condiciones climatológicas, se reserva el derecho de uso de las áreas verdes para preservar el buen estado de estas.</li>
            <li>Para revelaciones de género no se permite el uso de pirotecnia, bombas de humo, serpentinas, confeti y similares.</li>
          </ol>
        ),
      },
      en: {
        title: "Gazebos at Ciudad del Saber Park",
        content: `The gazebos at Ciudad del Saber Park provide spacious and comfortable outdoor areas, 
                  perfect for family gatherings, corporate events, and celebrations.`,
        buttonLabel: "Download the usage rules",
        modalTitle: "Gazebo usage rules",
        modalDesc: (
          <ol className="list-decimal list-inside">
            <li>All Ciudad del Saber Park rules apply.</li>
            <li>Water games and petting zoos are not allowed.</li>
            <li>The use of barbecues is not allowed. All food must be pre-prepared.</li>
            <li>If you wish to bring inflatables or trampolines, you must provide your own power generator (electric plant).</li>
            <li>If the stipulated number of people for the gazebos is not met, Ciudad del Saber Park may proceed with the cancellation of your activity for non-compliance.</li>
            <li>LA FUNDACIÓN reserves the right to restrict the use of green areas in the event of weather conditions to preserve their condition.</li>
            <li>For gender reveals, the use of pyrotechnics, smoke bombs, streamers, confetti, and similar items is not allowed.</li>
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

const container = document.getElementById('nwp-bohios-content-section-whith-an-image');
if (container) {
  const root = createRoot(container);
  root.render(
    <LanguageProvider>
      <ContentSectionWithAnImage />
    </LanguageProvider>
  );
}