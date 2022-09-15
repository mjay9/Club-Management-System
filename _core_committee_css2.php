<?php
    header("Content-type: text/css; charset: UTF-8");
?>

@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&display=swap');
  
  .sign {
    margin-top: 70px;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 50%;
    height: 50%;
    background-image: radial-gradient(
      ellipse 50% 35% at 50% 50%,
      #18206b,
      transparent
    );
    transform: translate(-50%, -50%);
    letter-spacing: 2;
    left: 50%;
    top: 50%;
    font-family: 'Playfair Display', serif;
    text-transform: uppercase;
    font-size: 3em;
    color: #e6ecff;
    text-shadow: 0 0 0.6rem #e6ecff, 0 0 1.5rem #6f65ff,
      -0.2rem 0.1rem 1rem #6f65ff, 0.2rem 0.1rem 1rem #6f65ff,
      0 -0.5rem 2rem #24f8ff, 0 0.5rem 3rem #24f8ff;
    animation: shine 2s forwards, flicker 3s infinite;
  }
  
  @keyframes blink {
    0%,
    22%,
    36%,
    75% {
      color: #e6ecff;
      text-shadow: 0 0 0.6rem #e6ecff, 0 0 1.5rem #6f65ff,
        -0.2rem 0.1rem 1rem #6f65ff, 0.2rem 0.1rem 1rem #6f65ff,
        0 -0.5rem 2rem #24f8ff, 0 0.5rem 3rem #24f8ff;
    }
    28%,
    33% {
      color: #6f65ff;
      text-shadow: none;
    }
    82%,
    97% {
      color: #24f8ff;
      text-shadow: none;
    }
  }
  
  .flicker {
    animation: shine 2s forwards, blink 3s 2s infinite;
  }
  
  .fast-flicker {
    animation: shine 2s forwards, blink 10s 1s infinite;
  }
  
  @keyframes shine {
    0% {
      color: #18206b;
      text-shadow: none;
    }
    100% {
      color: #e6ecff;
      text-shadow: 0 0 0.6rem #e6ecff, 0 0 1.5rem #6f65ff,
        -0.2rem 0.1rem 1rem #6f65ff, 0.2rem 0.1rem 1rem #6f65ff,
        0 -0.5rem 2rem #24f8ff, 0 0.5rem 3rem #24f8ff;
    }
  }
  
  @keyframes flicker {
    from {
      opacity: 1;
    }
  
    4% {
      opacity: 0.9;
    }
  
    6% {
      opacity: 0.85;
    }
  
    8% {
      opacity: 0.95;
    }
  
    10% {
      opacity: 0.9;
    }
  
    11% {
      opacity: 0.922;
    }
  
    12% {
      opacity: 0.9;
    }
  
    14% {
      opacity: 0.95;
    }
  
    16% {
      opacity: 0.98;
    }
  
    17% {
      opacity: 0.9;
    }
  
    19% {
      opacity: 0.93;
    }
  
    20% {
      opacity: 0.99;
    }
  
    24% {
      opacity: 1;
    }
  
    26% {
      opacity: 0.94;
    }
  
    28% {
      opacity: 0.98;
    }
  
    37% {
      opacity: 0.93;
    }
  
    38% {
      opacity: 0.5;
    }
  
    39% {
      opacity: 0.96;
    }
  
    42% {
      opacity: 1;
    }
  
    44% {
      opacity: 0.97;
    }
  
    46% {
      opacity: 0.94;
    }
  
    56% {
      opacity: 0.9;
    }
  
    58% {
      opacity: 0.9;
    }
  
    60% {
      opacity: 0.99;
    }
  
    68% {
      opacity: 1;
    }
  
    70% {
      opacity: 0.9;
    }
  
    72% {
      opacity: 0.95;
    }
  
    93% {
      opacity: 0.93;
    }
  
    95% {
      opacity: 0.95;
    }
  
    97% {
      opacity: 0.93;
    }
  
    to {
      opacity: 1;
    }
  }

  @media(max-width: 550px){
    .sign{
      font-size: 30px;
    }
  }