import React from 'react';
import { createRoot } from 'react-dom/client'
import Faq from '../Faq';

const faqItems = [
  { title: 'Why is the moon sometimes out during the day?', content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.' },
  { title: 'Why is the sky blue?', content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.' },
  { title: 'Will we ever discover aliens?', content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.' },
  { title: 'How much does the Earth weigh?', content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.' },
  { title: 'How do airplanes stay up?', content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.' }
];

export default function NwpFaq() {
  return (
    <div className="App">
      <Faq 
        faqTitle="Preguntas frecuentes sobre el Parque Ciudad del Saber"
        faqItems={faqItems}
      />
    </div>
  );
}

const container = document.getElementById('nwp-parque-faq');
if (container){
  const root = createRoot(container);
  root.render(<NwpFaq />);
}