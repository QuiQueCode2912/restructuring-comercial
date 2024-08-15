import React from 'react'
import { createRoot  } from 'react-dom/client'

export default function FeaturedVenues() {
  const cards = [
    {
      title: "Feroz cervecería artesanal",
      description: "Descubre sabores unicos, con amigos, después del trabajo",
      openingTime: "7:30 PM",
      closingTime: "9:00 PM",
      imageUrl: "https://images.unsplash.com/photo-1663622438610-00a72c139d8c?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
      link: "#"
    },
    {
      title: "Clayton Bowling",
      description: "Regresa en el tiempo y diviértete con familia y amigos",
      openingTime: "7:30 PM",
      closingTime: "9:00 PM",
      imageUrl: "https://images.unsplash.com/photo-1542744173-8e7e53415bb0?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
      link: "#"
    },
  ];

  return (
    <div className='nwp-padding-x-container bg-cdsgray700 pb-20'>
      <div className='nwp-container mx-auto'>
        <h4 className='text-4xl lg:text-5xl font-bold pb-14'>Disfruta del campus</h4>
        <div className='grid grid-cols-1 md:grid-cols-2 gap-8'>
          {cards.map((card, index) => (
            <div key={index} className='relative h-[400px] w-full overflow-hidden group'>
              <a href={card.link} className='block h-full w-full'>
                <div 
                  className="h-full w-full bg-center transition-transform duration-300 ease-in-out transform group-hover:scale-105"
                  style={{ backgroundImage: `url(${card.imageUrl})`, backgroundSize: 'cover' }}
                >
                </div>
                <div className={`absolute inset-0 bg-black bg-opacity-60 border-t-0 p-6 flex flex-col gap-y-4 justify-end text-white`}>
                  <p className='text-2xl font-bold'>{card.title}</p>
                  <p className='text-base'>{card.description}</p>
                  <p className='text-xl font-bold'>Abierto de {card.openingTime} a {card.closingTime}</p>
                  <div className="font-semibold hover:no-underline group-hover:text-cdsblue flex gap-x-2 items-center">
                    Conoce más
                    <div className="h-8 w-8 bg-white rounded-full grid place-content-center transition-all duration-150 ease-in-out text-black group-hover:translate-x-1 group-hover:text-cdsblue">
                      <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="32px" fill="currentColor"><path d="M673-446.67H160v-66.66h513l-240-240L480-800l320 320-320 320-47-46.67 240-240Z"/></svg>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          ))}
        </div>
      </div>
    </div>
  )
}

const container = document.getElementById('nwp-featured-venues');
if (container){
  const root = createRoot(container);
  root.render(<FeaturedVenues />);
}