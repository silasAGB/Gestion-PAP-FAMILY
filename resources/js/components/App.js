import React, { useEffect, useRef } from "react";

const App = () => {
    const myElementRef = useRef(null);

    useEffect(() => {
        const myElement = myElementRef.current;
        if (myElement) {
            // Vous pouvez accéder à l'élément DOM ici
            console.log(myElement);
        }
    }, []);

    return (
        <div>
            <h1 ref={myElementRef}>Hello, React!</h1>
        </div>
    );
};

export default App;
