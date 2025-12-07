// main.js - animations, smooth-scroll, and reduced-motion support
(function(){
  // smooth anchor scrolling
  document.querySelectorAll('a[href^="#"]').forEach(a=>{
    a.addEventListener('click', e=>{
      const href = a.getAttribute('href');
      if(href.length>1 && document.querySelector(href)){
        e.preventDefault();
        document.querySelector(href).scrollIntoView({behavior:'smooth',block:'start'});
      }
    });
  });

  // hero wave stroke draw animation
  function animateWave(){
    const wave = document.querySelector('#wavePath') || document.querySelector('.hero-wave path');
    if(!wave) return;
    const len = wave.getTotalLength ? wave.getTotalLength() : 1000;
    wave.style.strokeDasharray = len;
    wave.style.strokeDashoffset = len;
    wave.getBoundingClientRect();
    wave.animate([{strokeDashoffset: len},{strokeDashoffset: 0}],{duration:2200,easing:'ease-in-out',fill:'forwards'});
  }

  // fade-in on scroll for .section elements
  function handleScrollReveal(){
    const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if(prefersReduced) return;
    const els = document.querySelectorAll('.section, .activity-card, .team-card, .event-card');
    const io = new IntersectionObserver((entries)=>{
      entries.forEach(ent=>{
        if(ent.isIntersecting){
          ent.target.classList.add('reveal');
          io.unobserve(ent.target);
        }
      });
    }, {threshold:0.15});
    els.forEach(el => io.observe(el));
  }

  // Floating nodes animation
  function initFloatingNodes(){
    const nodeContainer = document.createElement('div');
    nodeContainer.classList.add('floating-nodes');
    document.body.appendChild(nodeContainer);

    for (let i = 0; i < 15; i++) {
      const node = document.createElement('span');
      node.classList.add('node');
      node.style.left = Math.random() * 100 + 'vw';
      node.style.animationDelay = Math.random() * 10 + 's';
      nodeContainer.appendChild(node);
    }
  }

  document.addEventListener('DOMContentLoaded', ()=>{
    animateWave();
    handleScrollReveal();
    initFloatingNodes();
    // show messages from query params
    const p = new URLSearchParams(window.location.search);
    if(p.get('contact_ok')) alert('Thanks! We received your message.');
    if(p.get('registered')) alert('Registration received — check your email for details (if provided).');
  });
})();
