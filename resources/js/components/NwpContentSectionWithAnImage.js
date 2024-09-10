import React, { useState } from 'react';
import { useLanguage } from './context/LanguageProvider';

export const NwpContentSectionWithAnImage = ({ title, content, buttonLabel, onButtonClick, image, modalTitle, modalDesc }) => {
  const { language } = useLanguage();
  const [modalState, setModalState] = useState({ isOpen: false, modalId: null });

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
        <div className='mx-auto nwp-container grid grid-cols-1 md:grid-cols-2 md:h-full md:gap-x-8'>
          <div className='flex flex-col md:col-span-1 gap-y-4 justify-center md:h-full pb-10 md:pb-0 pt-20'>
            <h3 className='font-bold text-3xl md:text-5xl'>{title}</h3>
            <p className='pb-2 text-lg'>{content}</p>
            <button className='font-semibold text-start flex gap-x-2 items-center' onClick={() => openModal(1)}>
              {buttonLabel}
              <div className="bg-cdsblue rounded-full min-w-8 min-h-8 h-8 w-8 grid place-content-center"> 
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z"/></svg>
              </div>
            </button>
          </div>
          <div className='md:col-span-1 '>
          </div>
        </div>
        <div className='hidden  md:absolute md:left-1/2 md:top-0 col-span-1 text-white font-bold md:grid grid-cols-1 h-[600px]'>
          <img src={image} alt="Piscina" className='w-[1200px] h-[600px] object-cover' />
        </div>
      </div>
      <div className=' md:hidden h-[374px]'>
        <img src={image} alt="Piscina" className='w-full  h-[374px] object-cover' />
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
                  <h2 className="text-2xl md:text-4xl font-bold py-2">{modalTitle}</h2>
                </div>
                <button className="bg-white rounded" onClick={closeModal}>
                  <svg xmlns="http://www.w3.org/2000/svg" height="28px" viewBox="0 -960 960 960" width="28px" fill="#000"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                </button>
              </div>
              <div className="text-base md:text-lg mb-4 max-h-[60vh] overflow-y-auto">
                {modalDesc}
              </div>
            </div>
          </div>
        )}
    </>
  );
};


