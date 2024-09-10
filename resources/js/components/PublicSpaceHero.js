import React, { useState } from 'react';
import { useLanguage } from './context/LanguageProvider';

const PublicSpaceHero = ({ title, content, buttonLabel, buttonLabel2, images }) => {
  const { language } = useLanguage();
  const [modalState, setModalState] = useState({ isOpen: false, modalId: null });

  const translations = {
    es: {
      exploreText: "Explora",
      paceText: "A tu ritmo",
      familyText: "Con familia",
      petText: "O tu mascota",
      modalTitle1: "Reglamentos de uso del Parque Ciudad del Saber",
      modalDesc1: (
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
      modalTitle2: "Políticas de reserva y cancelación de espacios de CDS",
      modalDesc2: (
        <div>
          <p>Las reservas realizadas a través de la página web recibirán un correo de confirmación.</p>
          <p>Para cancelar una reserva se debe acceder al correo de confirmación para desde allí cancelar la reserva.</p>
          <p>Las cancelaciones realizadas 12 horas antes de la fecha reservada recibirán un reembolso del 100%.</p>
          <p>Las cancelaciones realizadas dentro de las 12 horas antes de la fecha reservada recibirán un reembolso del 50%.</p>
          <p>Por favor, tenga en cuenta que los reembolsos sólo se tramitarán por ACH.</p>
        </div>
      ),
      closeButtonText: "Cerrar",
    },
    en: {
      exploreText: "Explore",
      paceText: "At your pace",
      familyText: "With family",
      petText: "Or your pet",
      modalTitle1: "Rules for the use of Ciudad del Saber Park",
      modalDesc1: (
        <ol className="list-decimal list-inside">
          <li>Alcohol consumption and sale are not allowed.</li>
          <li>Food and beverage (sodas, water, energy drinks, etc.) sales are not allowed.</li>
          <li>Smoking is not allowed.</li>
          <li>Proper use of parking is required. Parking on the sides of the main road of the Park is not allowed.</li>
          <li>The use of loud instruments (murgas, drums, speakers, horns, microphones, etc.) is not allowed.</li>
          <li>Please dispose of any trash generated during the use of the facility in the trash bins. A charge of B/. 100.00 will be applied if any type of waste is found in the assigned area.</li>
          <li>LA FUNDACIÓN reserves the right to close the facilities due to weather conditions to preserve their condition.</li>
          <li>LA FUNDACIÓN is not responsible for the loss of valuable items (jewelry, phones, sports equipment, etc.) during the event.</li>
          <li>The client releases LA FUNDACIÓN from any unforeseen events, injuries, or accidents that occur with participants during the event.</li>
          <li>Please respect and follow the instructions of Ciudad del Saber Park staff and Security agents.</li>
          <li>Acts of violence, fighting, and offensive language are prohibited during activities. If any of these occur, the client must remove the team or person involved, and if it is the audience, they must leave the premises.</li>
        </ol>
      ),
      modalTitle2: "Reservation and Cancellation Policies for CDS Spaces",
      modalDesc2: (
        <ol className="list-decimal list-inside">
          <li>Reservations made through the website will receive a confirmation email.</li>
          <li>To cancel a reservation, you must access the confirmation email and cancel the reservation from there.</li>
          <li>Cancellations made 12 hours before the reserved date will receive a 100% refund.</li>
          <li>Cancellations made within 12 hours of the reserved date will receive a 50% refund.</li>
          <li>Please note that refunds will only be processed via ACH.</li>
        </ol>
      ),
      closeButtonText: "Close",
    },
  };

  const openModal = (id) => {
    setModalState({ isOpen: true, modalId: id });
  };

  const closeModal = () => {
    setModalState({ isOpen: false, modalId: null });
  };

  const handleCloseClickOutside = (e) => {
    if (e.target.id === 'modal-background') {
      closeModal();
    }
  };

  return (
    <>
      <div className='md:relative nwp-padding-x-container md:h-[600px] bg-white'>
        <div className='mx-auto nwp-container md:grid md:grid-cols-2 md:h-full md:gap-x-8'>
          <div className='flex flex-col md:col-span-1 gap-y-4 justify-center md:h-full pb-20 md:pb-0 pt-20'>
            <h3 className='font-bold text-3xl md:text-5xl'>{title}</h3>
            <p className='pb-2 text-lg'>{content}</p>
            <button className='font-semibold text-start flex gap-x-2 items-center' onClick={() => openModal(1)}>
              {buttonLabel}
              <div className="bg-cdsblue rounded-full min-w-8 min-h-8 h-8 w-8 grid place-content-center"> 
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z"/></svg>
              </div>
            </button>
            <button className='font-semibold text-start flex gap-x-2 items-center' onClick={() => openModal(2)}>
              {buttonLabel2}
              <div className="bg-cdsblue rounded-full min-w-8 min-h-8 h-8 w-8 grid place-content-center"> 
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z"/></svg>
              </div>
            </button>
          </div>
        </div>
        <div className='hidden md:absolute md:left-1/2 md:top-0 col-span-1 text-white font-bold md:grid grid-cols-2 h-[600px]'>
          <div className='col-span-1 w-full bg-verde-habitat-accesible grid place-content-center'>
            <div>
              <p className='text-xl'>{translations[language].exploreText}</p>
              <p className='text-3xl'>{translations[language].paceText}</p>
            </div>
          </div>
          <div className='col-span-1'>
            <img src={images[0]} alt="Image 2" className='w-full h-full object-cover' />
          </div>
          <div className='col-span-1'>
            <img src={images[1]} alt="Image 3" className='w-full h-full object-cover' />
          </div>
          <div className='col-span-1 bg-verde-habitat-accesible grid place-content-center'>
            <div>
              <p className='text-xl'>{translations[language].familyText}</p>
              <p className='text-3xl'>{translations[language].petText}</p>
            </div>
          </div>
        </div>
      </div>
      <div className='md:col-span-1 md:hidden h-[374px] text-white font-bold grid grid-cols-2'>
        <div className='col-span-1 bg-verde-habitat-accesible grid place-content-center'>
          <p className='text-base'>{translations[language].exploreText}</p>
          <p className='text-xl'>{translations[language].paceText}</p>
        </div>
        <div className='col-span-1'>
          <img src={images[0]} alt="Image 2" className='w-full h-full object-cover' />
        </div>
        <div className='col-span-1'>
          <img src={images[1]} alt="Image 3" className='w-full h-full object-cover' />
        </div>
        <div className='col-span-1 bg-verde-habitat-accesible grid place-content-center'>
          <p className='text-base'>{translations[language].familyText}</p>
          <p className='text-xl'>{translations[language].petText}</p>
        </div>
      </div>

      {/* Modal 1 */}
        {modalState.isOpen && modalState.modalId === 1 && (
          <div
            id="modal-background"
            className="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
            onClick={handleCloseClickOutside}
          >
            <div className="bg-white p-8 mx-2 rounded-lg shadow-lg max-w-5xl w-full max-h-[90vh] overflow-y-auto">
              <div className='flex items-center justify-between pb-2'>
                <div>
                  <div className='h-1 w-12 bg-cdsblue rounded-full'></div>
                  <h2 className="text-2xl md:text-4xl font-bold py-2">{translations[language].modalTitle1}</h2>
                </div>
                <button className="bg-white rounded" onClick={closeModal}>
                  <svg xmlns="http://www.w3.org/2000/svg" height="28px" viewBox="0 -960 960 960" width="28px" fill="#000"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                </button>
              </div>
              <div className="text-base md:text-lg mb-4 max-h-[60vh] overflow-y-auto">
                {translations[language].modalDesc1}
              </div>
            </div>
          </div>
        )}

        {/* Modal 2 */}
        {modalState.isOpen && modalState.modalId === 2 && (
          <div
            id="modal-background"
            className="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
            onClick={handleCloseClickOutside}
          >
            <div className="bg-white p-8 mx-2 rounded-lg shadow-lg max-w-5xl w-full max-h-[90vh] overflow-y-auto">
              <div className='flex items-center justify-between pb-2'>
                <div>
                  <div className='h-1 w-12 bg-cdsblue rounded-full'></div>
                  <h2 className="text-2xl md:text-4xl font-bold py-2">{translations[language].modalTitle2}</h2>
                </div>
                <button className="bg-white rounded" onClick={closeModal}>
                  <svg xmlns="http://www.w3.org/2000/svg" height="28px" viewBox="0 -960 960 960" width="28px" fill="#000"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                </button>
              </div>
              <div className="text-base md:text-lg mb-4 max-h-[60vh] overflow-y-auto">
                {translations[language].modalDesc2}
              </div>
            </div>
          </div>
        )}
    </>
  );
};

export default PublicSpaceHero;
