/**
 * Animate the img in the home page
 * 
 */
anime({
  targets: 'img.imgPortada',
  keyframes: [
    {translateY: 20},
    {translateX: -250},
    {translateY: -20},
    {translateX: 250},
    {translateY: 20},
    {translateX: 0},
    {translateY: 0}
  ],
  duration: 10000,
  easing: 'easeOutElastic(1, .8)',
  loop: true
});