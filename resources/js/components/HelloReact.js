import { divide } from 'lodash';
import React from 'react';
import ReactDOM from 'react-dom';

export default function HelloReact() {
    return (
        
        <h1 className='nwp-h1 mt-2 font-bold'>Hello React!</h1>
        
    );
}

if (document.getElementById('hello-react')) {
    ReactDOM.render(<HelloReact />, document.getElementById('hello-react'));
}