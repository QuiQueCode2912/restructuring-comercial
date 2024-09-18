import React, { useState } from 'react';

export const AditionalServicesChild = ({ title, description, modalTitle, modalDesc, image }) => {
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
          <div className='flex flex-col md:flex-row gap-x-8 h-auto md:h-[200px] gap-y-4 md:gap-y-0 '>
            <img 
              src={image} // Usar la imagen recibida como prop
              alt={title} 
              className='w-full md:w-[260px] h-[200px] object-cover rounded-lg'
            />
            <div className='flex flex-col gap-y-4 h-full md:h-[200px] w-full md:justify-between'>
              <h6 className='text-2xl md:text-3xl font-bold'>{title}</h6>
              <p className='text-base'>{description}</p>
              <button
                className='py-2 px-3 rounded-lg text-black bg-white text-base font-semibold w-40 outline-0 focus:outline-0'
                onClick={() => openModal(1)}
              >
                Ver más
              </button>
            </div>
          </div>

      {/* Modal */}
      {modalState.isOpen && modalState.modalId === 1 && (
        <div
          id="modal-background"
          className="fixed inset-0 bg-black text-black bg-opacity-50 flex items-center justify-center z-50"
          onClick={handleCloseClickOutside}
        >
          <div className="bg-white p-8 mx-2 rounded-lg shadow-lg max-w-5xl w-full max-h-[90vh] overflow-y-auto">
            <div className='flex items-center justify-between pb-2'>
              <div>
                <div className='h-1 w-12 bg-cdsblue rounded-full'></div>
                <h2 className="text-2xl md:text-4xl font-bold py-2">{modalTitle}</h2>
              </div>
              <button className="bg-white rounded outline-0 focus:outline-0 active:outline-0" onClick={closeModal}>
                <svg xmlns="http://www.w3.org/2000/svg" height="28px" viewBox="0 -960 960 960" width="28px" fill="#000">
                  <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
                </svg>
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