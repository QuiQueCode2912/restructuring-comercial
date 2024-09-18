import React from 'react';

export const GoogleMap = ({ placeMap }) => {

  return (
    <section className="relative flex flex-col lg:flex-row items-center h-full w-full">
      <iframe src={placeMap} width="100%" height="600" allowFullScreen={false} loading="lazy" referrerPolicy="no-referrer-when-downgrade"></iframe>
    </section>
  );
};
