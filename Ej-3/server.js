const http = require('http');

const server = http.createServer((req, res) => {
  if (req.url === '/') {
    res.end('Hola bienvenido a la pagina de inicio');
  } else if (req.url === '/api') {
    res.writeHead(200, { 'Content-Type': 'application/json' });
    res.end(JSON.stringify({ message: 'Hola Mundo' }));
  } else {
    res.writeHead(404);
    res.end('Pagina no encontrada');
  }
});

server.listen(3000, () => {
  console.log('Servidor escuchando en el puerto 3000');
});