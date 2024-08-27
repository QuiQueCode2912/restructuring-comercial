import React from 'react';
import { useLanguage } from '../context/LanguageProvider';

const LanguageSelect = () => {
  const { language, setLanguage } = useLanguage();

  const handleLanguageChange = (newLanguage) => {
    setLanguage(newLanguage);
    window.location.reload(); // Recargar la página
  };

  return (
    <div>
      <p>Idioma seleccionado: {language}</p>
      <button 
        onClick={() => handleLanguageChange('es')} 
        disabled={language === 'es'} // Deshabilitar si ya está en español
      >
        Cambiar a Español
      </button>
      <button 
        onClick={() => handleLanguageChange('en')} 
        disabled={language === 'en'} // Deshabilitar si ya está en inglés
      >
        Cambiar a Inglés
      </button>
    </div>
  );
}

export default LanguageSelect;