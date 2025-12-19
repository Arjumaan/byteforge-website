// main.js - animations, smooth-scroll, and reduced-motion support
(function () {
  // smooth anchor scrolling
  document.querySelectorAll('a[href^="#"]').forEach(a => {
    a.addEventListener('click', e => {
      const href = a.getAttribute('href');
      if (href.length > 1 && document.querySelector(href)) {
        e.preventDefault();
        document.querySelector(href).scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });

  // hero wave stroke draw animation
  function animateWave() {
    const wave = document.querySelector('#wavePath') || document.querySelector('.hero-wave path');
    if (!wave) return;
    const len = wave.getTotalLength ? wave.getTotalLength() : 1000;
    wave.style.strokeDasharray = len;
    wave.style.strokeDashoffset = len;
    wave.getBoundingClientRect();
    wave.animate([{ strokeDashoffset: len }, { strokeDashoffset: 0 }], { duration: 2200, easing: 'ease-in-out', fill: 'forwards' });
  }

  // fade-in on scroll for .section elements
  function handleScrollReveal() {
    const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (prefersReduced) return;
    const els = document.querySelectorAll('.section, .activity-card, .team-card, .event-card');
    const io = new IntersectionObserver((entries) => {
      entries.forEach(ent => {
        if (ent.isIntersecting) {
          ent.target.classList.add('reveal');
          io.unobserve(ent.target);
        }
      });
    }, { threshold: 0.15 });
    els.forEach(el => io.observe(el));
  }



  // Floating nodes animation with Mouse Interaction
  function initFloatingNodes() {
    const nodeContainer = document.createElement('div');
    nodeContainer.classList.add('floating-nodes');
    document.body.appendChild(nodeContainer);

    const nodes = [];
    for (let i = 0; i < 20; i++) {
      const node = document.createElement('span');
      node.classList.add('node');
      let x = Math.random() * 100;
      let y = Math.random() * 100;
      node.style.left = x + 'vw';
      node.style.top = y + 'vh'; // Use top instead of animation delay for static pos + js move
      node.style.animationDelay = Math.random() * 10 + 's';
      nodeContainer.appendChild(node);
      nodes.push({ el: node, x, y, vx: (Math.random() - 0.5) * 0.2, vy: (Math.random() - 0.5) * 0.2 });
    }

    // Mouse repulsion
    // Optimized Mouse repulsion with requestAnimationFrame
    let mouseX = 0;
    let mouseY = 0;
    let isMouseMoving = false;

    window.addEventListener('mousemove', (e) => {
      mouseX = e.clientX / window.innerWidth * 100;
      mouseY = e.clientY / window.innerHeight * 100;
      isMouseMoving = true;
    });

    function updateNodes() {
      if (isMouseMoving) {
        nodes.forEach(n => {
          const dx = n.x - mouseX;
          const dy = n.y - mouseY;
          const dist = Math.sqrt(dx * dx + dy * dy);
          if (dist < 15) { // Repulse radius
            n.x += dx * 0.05; // Lower force for smoothness
            n.y += dy * 0.05;
            n.el.style.left = n.x + 'vw';
            n.el.style.top = n.y + 'vh';
          }
        });
        isMouseMoving = false; // Reset flag after update
      }
      requestAnimationFrame(updateNodes);
    }
    requestAnimationFrame(updateNodes);
  }

  // Team Card Close Functionality
  function initTeamCards() {
    const cards = document.querySelectorAll('.team-card');

    cards.forEach(card => {
      card.addEventListener('click', (e) => {
        if (card.classList.contains('expanded')) return;
        cards.forEach(c => c.classList.remove('expanded'));
        card.classList.add('expanded');
      });

      const closeBtn = card.querySelector('.team-close-btn');
      if (closeBtn) {
        closeBtn.addEventListener('click', (e) => {
          e.stopPropagation();
          card.classList.remove('expanded');
        });
      }
    });

    document.addEventListener('click', (e) => {
      if (!e.target.closest('.team-card')) {
        cards.forEach(c => c.classList.remove('expanded'));
      }
    });
  }

  // Preloader (Removed)
  function initPreloader() {
    // Disabled
  }

  // Floating Back to Top
  function initBackToTop() {
    const btn = document.querySelector('.back-to-top-float');
    if (!btn) return;

    window.addEventListener('scroll', () => {
      if (window.scrollY > 500) btn.classList.add('show');
      else btn.classList.remove('show');
    });

    btn.addEventListener('click', () => {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  // Typing Animation
  function initTypingEffect() {
    const mottoEl = document.getElementById('typingMotto');
    const leadEl = document.getElementById('heroLead');
    if (!mottoEl) return;

    const mottoText = "ByteForge ~ FORGING EVERY BYTE OF CODE TO CREATION";
    const leadText = leadEl ? (leadEl.getAttribute('data-text') || "") : "";

    let iMotto = 0;
    let iLead = 0;

    function typeMotto() {
      if (iMotto < mottoText.length) {
        mottoEl.textContent += mottoText.charAt(iMotto);
        iMotto++;
        setTimeout(typeMotto, 40); // Slightly faster motto
      } else {
        mottoEl.classList.remove('typing-cursor'); // Stop blinking on motto
        // Start Lead Typing
        if (leadEl && leadText) {
          leadEl.style.display = 'block'; // Make sure block is visible
          leadEl.style.opacity = '1';
          leadEl.classList.add('typing-cursor'); // Add cursor to lead
          setTimeout(typeLead, 300); // Pause before next line
        }
      }
    }

    function typeLead() {
      if (iLead < leadText.length) {
        leadEl.textContent += leadText.charAt(iLead);
        iLead++;
        setTimeout(typeLead, 25); // Fast typing for long text
      } else {
        leadEl.classList.remove('typing-cursor'); // Done
      }
    }

    setTimeout(typeMotto, 1000);
  }
  // Event Filtering Logic
  function initEventFilter() {
    const filterSelect = document.getElementById('filterType');
    if (!filterSelect) return;

    const cards = document.querySelectorAll('.event-card');

    filterSelect.addEventListener('change', (e) => {
      const filterValue = e.target.value.toLowerCase();

      cards.forEach(card => {
        const type = card.getAttribute('data-type').toLowerCase();

        if (filterValue === 'all' || type === filterValue) {
          card.style.display = 'flex';
          // Optional: Add a fade-in effect
          card.style.opacity = '0';
          setTimeout(() => card.style.opacity = '1', 50);
        } else {
          card.style.display = 'none';
        }
      });
    });
  }

  document.addEventListener('DOMContentLoaded', () => {
    initPreloader();
    animateWave();
    handleScrollReveal();
    initFloatingNodes();
    initTeamCards();
    initBackToTop();
    initTypingEffect();
    initEventFilter();
    // show messages from query params
    const p = new URLSearchParams(window.location.search);
    if (p.get('contact_ok')) alert('Thanks! We received your message.');
    if (p.get('registered')) alert('Registration received — check your email for details (if provided).');
  });

})();
