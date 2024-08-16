import React from 'react'
import { createRoot  } from 'react-dom/client'

export default function Academics() {
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
    <div className='nwp-padding-x-container bg-white pb-20'>
      <div className='nwp-container mx-auto grid grid-cols-1 md:grid-cols-3 gap-y-4 lg:gap-x-8'>
        <div className=' col-span-1 h-80 md:h-[400px] w-full'>
          <img 
          className='object-cover h-full w-full'
            src='https://images.unsplash.com/photo-1663622438610-00a72c139d8c?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'>

          </img>
        </div>
        <div className=' col-span-2'>
          <h4 className='text-4xl lg:text-5xl font-bold py-4 text-black'>Conoce las academias que brindan sus servicios en el parque</h4>
          <p className='pb-4'>Lorem ipsum dolor sit amet consectetur. Cursus amet nunc massa aliquam
              malesuada. At turpis eu laoreet fames scelerisque interdum. Blandit consequat mi
              euismod habitant nec quis faucibus lorem. Ut eget netus metus at et enim
              adipiscing fermentum lectus.
          </p>
          <p>Contáctanos: <a className='text-cdsblue font-semibold underline' href='#'>studyabroad@cdspanama.org</a></p>
        </div>
      </div>
    </div>
  )
}


const container = document.getElementById('nwp-academics');
if (container){
  const root = createRoot(container);
  root.render(<Academics />);
}