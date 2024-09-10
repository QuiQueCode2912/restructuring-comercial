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
        title: "La piscina más profunda de Panama",
        content: `Construida en 1948, esta piscina ha sido testigo de innumerables momentos 
                  de entrenamiento y esparcimiento para generaciones de militares. Hoy, abre 
                  sus puertas a toda la comunidad para que disfrutes de sus aguas cristalinas 
                  y de un ambiente familiar y acogedor.`,
        buttonLabel: "Reglamentos de uso de Piscina",
        modalTitle: "Reglamentos de uso de Piscina",
        modalDesc: (
          <ol className="list-decimal list-inside">
            <li>La entrada y salida de la piscina es a través de los baños y deberán ducharse antes de hacer uso de esta.</li>
            <li>No se permitirá el uso inadecuado de vestidos de baño. Está permitido también vestir prendas de fibras sintéticas como lycra, dry fit, neopreno u otras especiales para el agua. Deben utilizar gorro de natación.</li>
            <li>No se permite comer fuera del área designada o en los alrededores de la piscina.</li>
            <li>No está permitido actos afectivos e inmorales.</li>
            <li>Está prohibido sentarse en las carrileras.</li>
            <li>Se prohíbe el uso de lenguaje obsceno y abusivo.</li>
            <li>No se permitirá el uso de la piscina a personas que tengan cortaduras abiertas, ampollas, algún tipo de infección o uso de curitas.</li>
            <li>Las personas menores de edad deberán estar siempre acompañadas y supervisadas por una persona adulta responsable, que sepa nadar y permanezca en el área de la piscina.</li>
            <li>El uso del trampolín sólo se dará cuando el guardavida lo autorice.</li>
            <li>No está permitido correr ni realizar prácticas o juegos peligrosos ni en el perímetro ni dentro de la piscina.</li>
            <li>Después de comer, esperar el tiempo correspondiente para hacer uso de la piscina.</li>
            <li>La presencia del guardavida es para minimizar accidentes; todo adulto es responsable de sus dependientes e invitados.</li>
            <li>No se permite el ingreso de mascotas.</li>
            <li>Cada persona usa estas instalaciones bajo su propia responsabilidad, teniendo en cuenta sus condiciones y limitaciones físicas y de salud.</li>
          </ol>
        ),
      },
      en: {
        title: "The deepest pool in Panama",
        content: `Built in 1948, this pool has witnessed countless moments of training and 
                  recreation for generations of military personnel. Today, it opens its doors 
                  to the entire community to enjoy its crystal-clear waters and a family-friendly, 
                  welcoming atmosphere.`,
        buttonLabel: "Pool use regulations",
        modalTitle: "Pool use regulations",
        modalDesc: (
          <ol className="list-decimal list-inside">
            <li>Entry and exit to the pool is through the bathrooms, and you must shower before using it.</li>
            <li>Inappropriate swimwear is not allowed. You may wear synthetic fiber garments such as lycra, dry fit, neoprene, or other water-appropriate materials. Swim caps must be worn.</li>
            <li>Eating is not allowed outside the designated area or around the pool.</li>
            <li>Affectionate and immoral acts are not permitted.</li>
            <li>Sitting on the lane dividers is prohibited.</li>
            <li>Obscene and abusive language is prohibited.</li>
            <li>Persons with open cuts, blisters, any type of infection, or wearing bandages will not be allowed to use the pool.</li>
            <li>Minors must always be accompanied and supervised by a responsible adult who knows how to swim and remains in the pool area.</li>
            <li>The diving board may only be used when authorized by the lifeguard.</li>
            <li>Running or engaging in dangerous practices or games in or around the pool is not allowed.</li>
            <li>After eating, you must wait the appropriate time before using the pool.</li>
            <li>The lifeguard's presence is to minimize accidents; all adults are responsible for their dependents and guests.</li>
            <li>Pets are not allowed.</li>
            <li>Each person uses these facilities at their own risk, taking into account their physical and health conditions and limitations.</li>
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
      image="https://images.unsplash.com/photo-1691253104600-ccfd27782f3e?q=80&w=1287&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
    />
  );
}

const container = document.getElementById('nwp-piscina-content-section-whith-an-image');
if (container) {
  const root = createRoot(container);
  root.render(
    <LanguageProvider>
      <ContentSectionWithAnImage />
    </LanguageProvider>
  );
}
