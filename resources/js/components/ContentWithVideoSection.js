import React from 'react';
import ReactPlayer from 'react-player';

const ContentWithVideoSection = ({
  headed,
  title, 
  content, 
  backgroundImage, 
  videoUrl, 
  activities 
  }) => {

  return (
    <section 
      className="relative nwp-padding-x-container bg-cover bg-center z-10" 
      style={{ backgroundImage: `url('${backgroundImage}')` }}
    >
      <div className="absolute inset-0 bg-black opacity-80"></div>
      <div className="relative nwp-container flex flex-col md:flex-row z-10 mx-auto py-16 md:gap-x-4 lg:py-24">
        <div className="text-white max-w-3xl md:w-1/2 flex flex-col justify-between">
          {!headed && (
            <div className="h-1 w-12 bg-cdsverde mb-4"></div>
          )}
          {headed && (
            <p className='uppercase font-semibold text-cdsblue text-lg mb-4'>{headed}</p>
          )}
          <h2 className="text-3xl font-bold tracking-tight sm:text-5xl ">{title}</h2>
          <p className="mt-4 text-lg leading-6">{content}</p>
          <ul className="mt-8 space-y-4">
            {activities.map((activity, index) => (
              <li key={index} className="flex items-center gap-x-1">
                {activity.iconPath ? (
                  <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#FFFFFF">
                    <path d={activity.iconPath} />
                  </svg>
                ) : (
                  <span className="text-white">&#8226;</span>
                )}
                <span className='text-lg'>{activity.text}</span>
              </li>
            ))}
          </ul>
        </div>
        <div className="mt-8 hidden md:flex justify-center md:w-1/2 py-4 md:py-0">
          <ReactPlayer
            url={videoUrl}
            className="w-full max-w-lg rounded-lg shadow-lg"
            controls
            width="100%"
            height="100%"
          />
        </div>
        <div className="mt-8 md:hidden justify-center h-64 py-4 md:py-0">
          <ReactPlayer
            url={videoUrl}
            className="w-full max-w-lg rounded-lg shadow-lg"
            controls
            width="100%"
            height="100%"
          />
        </div>
      </div>
    </section>
  )
}

export default ContentWithVideoSection;
