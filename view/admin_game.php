<?php
session_start();
// Optional session check (uncomment if you want to restrict access)
// if (!isset($_SESSION['admin_logged_in'])) {
//     header('Location: login.php');
//     exit();
// }
if (isset($_POST['back'])) {
    header('Location: admin_dashboard.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Animated Dragon</title>
  <style>
    html, body {
      margin: 0;
      padding: 0;
      background: #111;
      width: 100vw;
      height: 100vh;
      overflow: hidden;
      box-sizing: border-box;
    }
    body {
      min-height: 100vh;
      width: 100vw;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .game-container {
      background: #181818;
      border: 3px solid #fff;
      border-radius: 28px;
      box-shadow: 0 8px 48px #000c, 0 1.5px 0 #fff7 inset;
      position: relative;
      width: 1500px;
      height: 900px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 30px auto;
      overflow: hidden;
      max-width: 98vw;
      max-height: 96vh;
      transition: width 0.2s, height 0.2s;
    }
    canvas {
      display: block;
      width: 100%;
      height: 100%;
      background: #000;
      position: relative;
      border-radius: 22px;
      z-index: 0;
    }
    .back-btn {
      position: absolute;
      top: 32px;
      left: 32px;
      z-index: 2;
      background: #1a1a1a;
      color: #fff;
      border: 1px solid #fff;
      border-radius: 9px;
      font-size: 1.35rem;
      padding: 12px 36px;
      cursor: pointer;
      opacity: 0.88;
      transition: opacity 0.2s, background 0.2s;
    }
    .back-btn:hover {
      opacity: 1;
      background: #222;
    }
    @media (max-width: 1600px) {
      .game-container {
        width: 98vw;
        height: 60vw;
        min-height: 420px;
        min-width: 350px;
        max-height: 90vh;
        max-width: 100vw;
      }
    }
    @media (max-width: 900px) {
      .game-container {
        width: 100vw;
        height: 60vw;
        min-height: 240px;
        min-width: 140px;
        border-radius: 0;
      }
      .back-btn {
        top: 12px;
        left: 12px;
        font-size: 1rem;
        padding: 8px 18px;
      }
    }
  </style>
</head>
<body>
  <div class="game-container">
    <form method="post">
      <button type="submit" name="back" class="back-btn">&larr; Back to Dashboard</button>
    </form>
    <canvas id="beetle" width="1500" height="900"></canvas>
  </div>
  <script>
    const canvas = document.getElementById('beetle');
    const ctx = canvas.getContext('2d');

    // Resize canvas to fit game-container box (not window)
    function resize() {
      const container = document.querySelector('.game-container');
      canvas.width = container.clientWidth;
      canvas.height = container.clientHeight;
    }
    resize();
    window.addEventListener("resize", resize);

    // Dragon shape size tuning
    const SEGMENTS = 70;
    const SEGMENT_LENGTH = Math.min(canvas.width, canvas.height) / 42;

    function bodyRadius(i) {
      const t = i / (SEGMENTS - 1);
      let base = 24 + 32 * Math.sin(Math.PI * Math.pow(1-t, 1.33));
      if (t > 0.9) base = Math.max(1, base - 38 * (t - 0.9) / 0.1);
      if (base < 1.5) base = 1.5;
      return base;
    }

    const LEG_PAIRS = 7;
    const LEG_SPACING = Math.floor(SEGMENTS / (LEG_PAIRS + 1));
    const LEG_LENGTH = Math.max(55, canvas.height / 15.5);
    const FINGER_LENGTH = LEG_LENGTH * 0.33;
    const FINGER_ANGLE = Math.PI / 2.3;

    let mouse = { x: canvas.width / 2, y: canvas.height / 2 };
    canvas.addEventListener('mousemove', e => {
      const rect = canvas.getBoundingClientRect();
      mouse.x = (e.clientX - rect.left) * (canvas.width / rect.width);
      mouse.y = (e.clientY - rect.top) * (canvas.height / rect.height);
    });

    window.addEventListener('resize', () => {
      resize();
      mouse.x = canvas.width / 2;
      mouse.y = canvas.height / 2;
      resetSegments();
    });

    let segments = [];
    function resetSegments() {
      segments = [];
      for (let i = 0; i < SEGMENTS; i++) {
        segments.push({ x: mouse.x, y: mouse.y });
      }
    }
    resetSegments();

    function drawLeg(seg, angle, isLeft, legIndex, time) {
      let baseAngle = angle + (isLeft ? Math.PI / 2 : -Math.PI / 2);
      baseAngle += (isLeft ? -1 : 1) * Math.PI / 7.5;
      const ex = seg.x + Math.cos(baseAngle) * LEG_LENGTH;
      const ey = seg.y + Math.sin(baseAngle) * LEG_LENGTH;
      ctx.save();
      ctx.strokeStyle = "#fff";
      ctx.lineWidth = 7.2;
      ctx.beginPath();
      ctx.moveTo(seg.x, seg.y);
      ctx.lineTo(ex, ey);
      ctx.stroke();
      ctx.lineWidth = 5;
      for (let f = -1; f <= 1; f++) {
        let fingerA = baseAngle + f * FINGER_ANGLE * 0.53;
        let fx = ex + Math.cos(fingerA) * FINGER_LENGTH;
        let fy = ey + Math.sin(fingerA) * FINGER_LENGTH;
        ctx.beginPath();
        ctx.moveTo(ex, ey);
        ctx.lineTo(fx, fy);
        ctx.stroke();
      }
      ctx.restore();
    }

    function drawDragonHead(seg, angle, time) {
      ctx.save();
      ctx.translate(seg.x, seg.y);
      ctx.rotate(angle);

      ctx.save();
      ctx.beginPath();
      ctx.ellipse(0, 0, 44, 38, 0, 0, Math.PI * 2);
      ctx.fillStyle = "#111";
      ctx.globalAlpha = 0.22;
      ctx.fill();
      ctx.globalAlpha = 1;
      ctx.strokeStyle = "#fff";
      ctx.lineWidth = 7.2;
      ctx.stroke();
      ctx.restore();

      ctx.save();
      ctx.beginPath();
      ctx.ellipse(0, 28, 18, 6, 0, 0, Math.PI * 2);
      ctx.globalAlpha = 0.17;
      ctx.fillStyle = "#fff";
      ctx.fill();
      ctx.restore();

      ctx.save();
      ctx.beginPath();
      ctx.moveTo(-18, 16);
      ctx.quadraticCurveTo(0, 38, 18, 16);
      ctx.lineWidth = 5;
      ctx.strokeStyle = "#fff";
      ctx.stroke();
      ctx.restore();

      ctx.save();
      ctx.beginPath();
      ctx.arc(17, -13, 4, 0, Math.PI * 2);
      ctx.arc(-17, -13, 4, 0, Math.PI * 2);
      ctx.lineWidth = 2.6;
      ctx.strokeStyle = "#fff";
      ctx.stroke();
      ctx.restore();

      ctx.save();
      ctx.beginPath();
      ctx.arc(-21, -11, 7, 0, Math.PI * 2);
      ctx.arc(21, -11, 7, 0, Math.PI * 2);
      ctx.lineWidth = 4.1;
      ctx.strokeStyle = "#fff";
      ctx.stroke();
      ctx.beginPath();
      ctx.arc(-21, -11, 2.6, 0, Math.PI * 2);
      ctx.arc(21, -11, 2.6, 0, Math.PI * 2);
      ctx.fillStyle = "#fff";
      ctx.globalAlpha = 0.75;
      ctx.fill();
      ctx.globalAlpha = 1;
      ctx.restore();

      ctx.save();
      ctx.beginPath();
      ctx.moveTo(-29, -23);
      ctx.quadraticCurveTo(-20, -32 - Math.sin(time*1.7)*2, -13, -23);
      ctx.moveTo(29, -23);
      ctx.quadraticCurveTo(20, -32 - Math.cos(time*1.6)*2, 13, -23);
      ctx.lineWidth = 2.7;
      ctx.strokeStyle = "#fff";
      ctx.stroke();
      ctx.restore();

      for (let side of [-1, 1]) {
        ctx.save();
        ctx.rotate(side * Math.PI / 3.3);
        ctx.beginPath();
        ctx.moveTo(0, -34);
        ctx.bezierCurveTo(
          side * -22, -68,
          side * 16, -99,
          side * 33, -117 + Math.cos(time * 0.7 + side) * 12
        );
        ctx.lineWidth = 3.2;
        ctx.strokeStyle = "#fff";
        ctx.stroke();
        ctx.restore();
      }

      for (let side of [-1, 1]) {
        ctx.save();
        ctx.beginPath();
        ctx.moveTo(26 * side, -6);
        ctx.bezierCurveTo(
          67 * side, 18 + Math.sin(time + side) * 16,
          104 * side, 55 + Math.cos(time * 0.8 - side) * 17,
          74 * side, 90 + Math.sin(time * 1.1 + side) * 25
        );
        ctx.lineWidth = 2.8;
        ctx.strokeStyle = "#fff";
        ctx.stroke();
        ctx.restore();
      }

      for (let i = -1; i <= 1; i++) {
        ctx.save();
        ctx.beginPath();
        ctx.moveTo(i * 15, 32);
        ctx.lineTo(i * 18, 58 + Math.sin(time*0.7 + i)*4);
        ctx.lineWidth = 3;
        ctx.strokeStyle = "#fff";
        ctx.stroke();
        ctx.restore();
      }

      ctx.restore();
    }

    function animate() {
      const time = performance.now() * 0.001;

      segments[0].x += (mouse.x - segments[0].x) * 0.024;
      segments[0].y += (mouse.y - segments[0].y) * 0.024;
      for (let i = 1; i < SEGMENTS; i++) {
        let prev = segments[i - 1];
        let seg = segments[i];
        let dx = prev.x - seg.x;
        let dy = prev.y - seg.y;
        let angle = Math.atan2(dy, dx);
        seg.x = prev.x - Math.cos(angle) * SEGMENT_LENGTH;
        seg.y = prev.y - Math.sin(angle) * SEGMENT_LENGTH;
      }

      ctx.clearRect(0, 0, canvas.width, canvas.height);

      for (let i = SEGMENTS - 1; i >= 0; i--) {
        let seg = segments[i];
        let prev = (i === 0 ? segments[1] : segments[i - 1]);
        let dx = prev.x - seg.x;
        let dy = prev.y - seg.y;
        let angle = Math.atan2(dy, dx);

        ctx.save();
        ctx.translate(seg.x, seg.y);
        ctx.rotate(angle + Math.PI / 2);
        ctx.beginPath();
        ctx.arc(0, 0, bodyRadius(i), 0, Math.PI * 2);
        ctx.globalAlpha = 0.91 - i * 0.013;
        ctx.strokeStyle = "#fff";
        ctx.lineWidth = 5.2;
        ctx.stroke();
        ctx.restore();
      }

      for (let i = 1; i <= LEG_PAIRS; i++) {
        const segIdx = i * LEG_SPACING;
        if (segIdx >= SEGMENTS - 8) continue;
        const seg = segments[segIdx];
        const prev = segments[segIdx - 1];
        const angle = Math.atan2(prev.y - seg.y, prev.x - seg.x);
        drawLeg(seg, angle, true, i, time);
        drawLeg(seg, angle, false, i, time);
      }

      let headSeg = segments[0];
      let next = segments[1];
      let headAngle = Math.atan2(next.y - headSeg.y, next.x - headSeg.x);
      drawDragonHead(headSeg, headAngle, time);

      requestAnimationFrame(animate);
    }

    // Reset segments if canvas size changes
    window.addEventListener('resize', () => {
      resize();
      resetSegments();
    });

    animate();
  </script>
</body>
</html>