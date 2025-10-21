import React, { useState, useEffect } from 'react';
import Modal from 'react-modal';
import { Lightbulb, Users, Target, BookOpen, Cpu, Notebook as Robot, Brain, Network, Globe2, MessageCircle, ChevronDown, Plus, Minus, Menu, X, CheckCircle2, ArrowRight, Send } from 'lucide-react';

Modal.setAppElement('#root');

interface Testimonial {
  quote: string;
  author: string;
  role: string;
  image: string;
}

interface FormData {
  name: string;
  email: string;
  message: string;
}

function App() {
  const [showWhatsApp, setShowWhatsApp] = useState(false);
  const [openFaq, setOpenFaq] = useState<number | null>(null);
  const [isMenuOpen, setIsMenuOpen] = useState(false);
  const [activeSection, setActiveSection] = useState('');
  const [activeTestimonial, setActiveTestimonial] = useState(0);
  const [isModalOpen, setIsModalOpen] = useState(false);
  const [isTestimonialModalOpen, setIsTestimonialModalOpen] = useState(false);
  const [isInfoModalOpen, setIsInfoModalOpen] = useState(false);
  const [formData, setFormData] = useState<FormData>({
    name: '',
    email: '',
    message: ''
  });
  const [testimonialForm, setTestimonialForm] = useState({
    name: '',
    role: '',
    message: ''
  });
  const [submitSuccess, setSubmitSuccess] = useState(false);

  useEffect(() => {
    const timer = setTimeout(() => {
      setShowWhatsApp(true);
    }, 15000);

    const handleScroll = () => {
      const sections = ['sobre', 'objetivos', 'depoimentos', 'contato'];
      const currentSection = sections.find(section => {
        const element = document.getElementById(section);
        if (element) {
          const rect = element.getBoundingClientRect();
          return rect.top <= 100 && rect.bottom >= 100;
        }
        return false;
      });
      
      setActiveSection(currentSection || '');
    };

    window.addEventListener('scroll', handleScroll);
    return () => {
      clearTimeout(timer);
      window.removeEventListener('scroll', handleScroll);
    };
  }, []);

  const handleWhatsAppClick = () => {
    window.open('https://wa.me/5500000000000', '_blank');
  };

  const handleFormSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    // Here you would typically send the data to a server
    console.log('Form submitted:', formData);
    setSubmitSuccess(true);
    setTimeout(() => {
      setIsModalOpen(false);
      setSubmitSuccess(false);
      setFormData({ name: '', email: '', message: '' });
    }, 2000);
  };

  const handleTestimonialSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    // Here you would typically save the testimonial
    const newTestimonial = {
      quote: testimonialForm.message,
      author: testimonialForm.name,
      role: testimonialForm.role,
      image: "https://images.pexels.com/photos/3785104/pexels-photo-3785104.jpeg?auto=compress&cs=tinysrgb&w=600"
    };
    testimonials.push(newTestimonial);
    setTestimonialForm({ name: '', role: '', message: '' });
    setIsTestimonialModalOpen(false);
  };

  const toggleMenu = () => {
    setIsMenuOpen(!isMenuOpen);
  };

  const testimonials = [
    {
      quote: "Temas abordados de forma clara e objetiva. O projeto trouxe uma nova perspectiva sobre o futuro da educação e do trabalho. A Indústria 4.0 é uma realidade e precisamos estar preparados.",
      author: "Anderson Lima",
      role: "Professor de Tecnologia",
      image: "https://img.freepik.com/fotos-gratis/retrato-de-um-professor-a-trabalhar-no-sistema-educativo_23-2151737187.jpg?t=st=1746936075~exp=1746939675~hmac=e4107ac8a794d7cfb833b3d5a33fbe40271b3b55e829e57cc080b88e920b6e1d&w=600"
    },
    {
      quote: "Com o projeto, percebi como a Indústria 4.0 já faz parte do meu futuro profissional. Entender essas tecnologias me motiva a buscar novas qualificações.",
      author: "Maria Silva",
      role: "Aluna do Curso Técnico em Automação",
      image: "https://img.freepik.com/fotos-gratis/mulher-ensinando-na-sala-de-aula_23-2151696399.jpg?t=st=1746936199~exp=1746939799~hmac=f58682456cef14cd916bc6986cdf199b3b0478eb13487b16fcd77c0fc7b6f1da&w=600"
    },
    {
      quote: "Foi Incrivel cada assunto abordado. A Indústria 4.0 é o futuro e estou feliz por fazer parte disso.",
      author: "Andreia Santos",
      role: "Ex. Aluno",
      image: "https://img.freepik.com/fotos-gratis/linda-freelancer-feminina-falando-em-uma-videoconferencia-on-line-e-um-laptop-em-uma-area-de-trabalho-de-escritorio-ou-home-desk_231208-13592.jpg?t=st=1746935689~exp=1746939289~hmac=ca75ede9ba56627a84826143bbc0fd86263bd9af506da94adf2e38588e9b9440&w=600"
    },
    {
      quote: "Conteudos muito relevantes e atuais. A Indústria 4.0 é uma realidade e precisamos estar preparados. Espero que mais alunos possam participar.",
      author: "Mariane Oliveira",
      role: "Aluna do Curso Técnico em Informática",
      image: "https://img.freepik.com/fotos-premium/telefone-de-mulher-e-estudante-com-laptop-em-casa-para-projeto-de-navegacao-na-web-ou-estudando-a-noite-bokeh-mobile-e-sorriso-de-freelancer-de-negocios-feliz-ou-trabalhador-remoto-com-computador-para-pesquisa_590464-166168.jpg?w=600"
    },
    {
      quote: "As discussões sobre Indústria 4.0 foram muito enriquecedoras. Me ajudaram a repensar como integrar esses temas nas minhas aulas.",
      author: "Prof. Carlos Santos",
      role: "Professor de Tecnologia",
      image: "https://images.pexels.com/photos/5905902/pexels-photo-5905902.jpeg?auto=compress&cs=tinysrgb&w=600"
    },
    {
      quote: "É importante que a escola traga esses temas atuais para dentro da comunidade. Isso nos ajuda a entender as mudanças no mercado de trabalho.",
      author: "João Oliveira",
      role: "Membro da Comunidade",
      image: "https://images.pexels.com/photos/8197534/pexels-photo-8197534.jpeg?auto=compress&cs=tinysrgb&w=600"
    }
  ];

  const modalStyles = {
    content: {
      top: '50%',
      left: '50%',
      right: 'auto',
      bottom: 'auto',
      marginRight: '-50%',
      transform: 'translate(-50%, -50%)',
      borderRadius: '1rem',
      padding: '2rem',
      maxWidth: '500px',
      width: '90%'
    },
    overlay: {
      backgroundColor: 'rgba(0, 0, 0, 0.75)'
    }
  };

  return (
    <div className="min-h-screen bg-white">
      {/* Header */}
      <header className="fixed w-full bg-white/90 backdrop-blur-sm z-50 border-b border-gray-100">
        <nav className="container mx-auto px-4 sm:px-6 py-4">
          <div className="flex items-center justify-between">
            <div className="flex items-center">
              <Robot className="h-8 w-8 text-blue-600" />
              <span className="ml-2 text-xl sm:text-2xl font-bold bg-gradient-to-r from-blue-600 to-blue-800 bg-clip-text text-transparent">Ed. Qualidade 4.0</span>
            </div>
            
            {/* Desktop Navigation */}
            <div className="hidden md:flex space-x-8">
              <a href="#sobre" className={`nav-link ${activeSection === 'sobre' ? 'text-blue-600 font-medium' : 'text-gray-600 hover:text-blue-600'}`}>
                Sobre
              </a>
              <a href="#objetivos" className={`nav-link ${activeSection === 'objetivos' ? 'text-blue-600 font-medium' : 'text-gray-600 hover:text-blue-600'}`}>
                Objetivos
              </a>
              <a href="#depoimentos" className={`nav-link ${activeSection === 'depoimentos' ? 'text-blue-600 font-medium' : 'text-gray-600 hover:text-blue-600'}`}>
                Depoimentos
              </a>
              <a href="#contato" className={`nav-link ${activeSection === 'contato' ? 'text-blue-600 font-medium' : 'text-gray-600 hover:text-blue-600'}`}>
                Contato
              </a>
            </div>
            
            {/* Desktop CTA */}
            <div className="hidden md:flex items-center space-x-4">
              <button 
                onClick={() => setIsModalOpen(true)}
                className="bg-blue-600 text-white px-6 py-2 rounded-full font-medium hover:bg-blue-700 transition-colors"
              >
                Participar do Projeto
              </button>
            </div>

            {/* Mobile Menu Button */}
            <button 
              onClick={toggleMenu}
              className="md:hidden p-2 rounded-lg hover:bg-gray-100 transition-colors"
            >
              {isMenuOpen ? (
                <X className="h-6 w-6 text-gray-600" />
              ) : (
                <Menu className="h-6 w-6 text-gray-600" />
              )}
            </button>
          </div>

          {/* Mobile Navigation */}
          {isMenuOpen && (
            <div className="md:hidden absolute top-full left-0 right-0 bg-white border-b border-gray-100 p-4 shadow-lg animate-fade-in">
              <div className="flex flex-col space-y-4">
                <a href="#sobre" className="py-2 px-4 rounded-lg hover:bg-blue-50 transition-colors text-gray-600">
                  Sobre
                </a>
                <a href="#objetivos" className="py-2 px-4 rounded-lg hover:bg-blue-50 transition-colors text-gray-600">
                  Objetivos
                </a>
                <a href="#depoimentos" className="py-2 px-4 rounded-lg hover:bg-blue-50 transition-colors text-gray-600">
                  Depoimentos
                </a>
                <a href="#contato" className="py-2 px-4 rounded-lg hover:bg-blue-50 transition-colors text-gray-600">
                  Contato
                </a>
                <button 
                  onClick={() => setIsModalOpen(true)}
                  className="w-full bg-blue-600 text-white py-3 px-6 rounded-xl font-medium hover:bg-blue-700 transition-colors"
                >
                  Participar do Projeto
                </button>
              </div>
            </div>
          )}
        </nav>
      </header>

      {/* Hero Section */}
      <section className="pt-24 sm:pt-32 pb-16 sm:pb-20 bg-gradient-to-b from-blue-50 to-white">
        <div className="container mx-auto px-4 sm:px-6">
          <div className="max-w-4xl mx-auto text-center">
            <h1 className="text-4xl sm:text-5xl md:text-6xl font-bold text-gray-900 mb-6 leading-tight">
              Construindo o Futuro com a{' '}
              <span className="bg-gradient-to-r from-blue-600 to-blue-800 bg-clip-text text-transparent">Indústria 4.0</span>
            </h1>
            <p className="text-lg sm:text-xl text-gray-600 mb-8 sm:mb-10 max-w-2xl mx-auto">
              Preparando a comunidade escolar para os desafios e oportunidades do mercado de trabalho do futuro.
            </p>
            <div className="flex flex-col sm:flex-row items-center justify-center gap-4">
              <button 
                onClick={() => setIsModalOpen(true)}
                className="w-full sm:w-auto bg-blue-600 text-white px-8 py-4 rounded-full font-medium hover:bg-blue-700 transition-colors flex items-center justify-center"
              >
                Participar do Projeto
                <ArrowRight className="ml-2 h-5 w-5" />
              </button>
              <button 
                onClick={() => setIsInfoModalOpen(true)}
                className="w-full sm:w-auto bg-white text-gray-700 px-8 py-4 rounded-full font-medium border border-gray-200 hover:border-blue-600 transition-colors"
              >
                Saber Mais
              </button>
            </div>
          </div>
        </div>
      </section>

      {/* About Section */}
      <section id="sobre" className="py-16 sm:py-20">
        <div className="container mx-auto px-4 sm:px-6">
          <div className="max-w-4xl mx-auto">
            <div className="text-center mb-12">
              <h2 className="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
                Sobre o Projeto
              </h2>
              <p className="text-lg text-gray-600">
                Uma iniciativa que une educação, tecnologia e comunidade.
              </p>
            </div>
            <div className="grid md:grid-cols-2 gap-8 items-center">
              <div>
                <img 
                  src="https://images.pexels.com/photos/3862130/pexels-photo-3862130.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" 
                  alt="Tecnologia na educação" 
                  className="rounded-2xl shadow-lg"
                />
              </div>
              <div className="space-y-6">
                <div className="flex items-start gap-4">
                  <div className="bg-blue-100 p-3 rounded-lg">
                    <Target className="h-6 w-6 text-blue-600" />
                  </div>
                  <div>
                    <h3 className="text-xl font-semibold mb-2">Nossa Missão</h3>
                    <p className="text-gray-600">
                      Capacitar a comunidade escolar com conhecimentos essenciais sobre a Indústria 4.0, preparando-os para o futuro do trabalho.
                    </p>
                  </div>
                </div>
                <div className="flex items-start gap-4">
                  <div className="bg-blue-100 p-3 rounded-lg">
                    <Users className="h-6 w-6 text-blue-600" />
                  </div>
                  <div>
                    <h3 className="text-xl font-semibold mb-2">Público-Alvo</h3>
                    <p className="text-gray-600">
                      Alunos, professores, funcionários e comunidade local.
                    </p>
                  </div>
                </div>
                <div className="flex items-start gap-4">
                  <div className="bg-blue-100 p-3 rounded-lg">
                    <Brain className="h-6 w-6 text-blue-600" />
                  </div>
                  <div>
                    <h3 className="text-xl font-semibold mb-2">Metodologia</h3>
                    <p className="text-gray-600">
                      Workshops práticos, palestras interativas e material didático digital sobre as tecnologias da Indústria 4.0.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* Objectives Section */}
      <section id="objetivos" className="py-16 sm:py-20 bg-gray-50">
        <div className="container mx-auto px-4 sm:px-6">
          <div className="text-center mb-12">
            <h2 className="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
              Objetivos do Projeto
            </h2>
            <p className="text-lg text-gray-600 max-w-2xl mx-auto">
              Preparando nossa comunidade para as transformações tecnológicas
            </p>
          </div>
          <div className="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 max-w-6xl mx-auto">
            {[
              {
                icon: <Cpu className="h-8 w-8 text-blue-600" />,
                title: "Tecnologias Fundamentais",
                description: "Apresentar as principais tecnologias da Indústria 4.0: IoT, Big Data, IA, Manufatura Aditiva e Robótica."
              },
              {
                icon: <Network className="h-8 w-8 text-blue-600" />,
                title: "Transformação Digital",
                description: "Explicar como as tecnologias estão transformando os processos produtivos e o ambiente de trabalho."
              },
              {
                icon: <BookOpen className="h-8 w-8 text-blue-600" />,
                title: "Capacitação Contínua",
                description: "Promover a cultura do aprendizado contínuo e adaptação às mudanças tecnológicas."
              },
              {
                icon: <Target className="h-8 w-8 text-blue-600" />,
                title: "Competências Futuras",
                description: "Identificar e desenvolver as competências técnicas e comportamentais valorizadas pelo mercado."
              },
              {
                icon: <Lightbulb className="h-8 w-8 text-blue-600" />,
                title: "Inovação",
                description: "Estimular o pensamento inovador e o empreendedorismo tecnológico."
              },
              {
                icon: <Globe2 className="h-8 w-8 text-blue-600" />,
                title: "Conexão Global",
                description: "Preparar os alunos para atuarem em um mercado de trabalho globalizado e digital."
              }
            ].map((objective, index) => (
              <div 
                key={index}
                className="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition-all duration-300"
              >
                <div className="bg-blue-50 w-14 h-14 rounded-lg flex items-center justify-center mb-4">
                  {objective.icon}
                </div>
                <h3 className="text-xl font-semibold text-gray-900 mb-3">
                  {objective.title}
                </h3>
                <p className="text-gray-600">
                  {objective.description}
                </p>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Testimonials Section */}
      <section id="depoimentos" className="py-16 sm:py-20">
        <div className="container mx-auto px-4 sm:px-6">
          <div className="text-center mb-12">
            <h2 className="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
              Depoimentos da Comunidade
            </h2>
            <p className="text-lg text-gray-600 max-w-2xl mx-auto">
              Veja o impacto do projeto na vida das pessoas
            </p>
            <button
              onClick={() => setIsTestimonialModalOpen(true)}
              className="mt-4 bg-blue-600 text-white px-6 py-2 rounded-full font-medium hover:bg-blue-700 transition-colors"
            >
              Deixe seu Depoimento
            </button>
          </div>
          <div className="max-w-4xl mx-auto">
            <div className="relative">
              <div className="overflow-hidden">
                <div className="flex transition-transform duration-500" style={{ transform: `translateX(-${activeTestimonial * 100}%)` }}>
                  {testimonials.map((testimonial, index) => (
                    <div key={index} className="w-full flex-shrink-0 px-4">
                      <div className="bg-white rounded-2xl p-8 shadow-lg">
                        <div className="flex items-center mb-6">
                          <img 
                            src={testimonial.image} 
                            alt={testimonial.author} 
                            className="w-16 h-16 rounded-full object-cover"
                          />
                          <div className="ml-4">
                            <h4 className="text-xl font-semibold text-gray-900">{testimonial.author}</h4>
                            <p className="text-gray-600">{testimonial.role}</p>
                          </div>
                        </div>
                        <p className="text-gray-600 italic">"{testimonial.quote}"</p>
                      </div>
                    </div>
                  ))}
                </div>
              </div>
              <div className="flex justify-center mt-6 space-x-2">
                {testimonials.map((_, index) => (
                  <button
                    key={index}
                    onClick={() => setActiveTestimonial(index)}
                    className={`w-3 h-3 rounded-full transition-colors ${
                      activeTestimonial === index ? 'bg-blue-600' : 'bg-gray-300'
                    }`}
                  />
                ))}
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* Contact Section */}
      <section id="contato" className="py-16 sm:py-20 bg-blue-600">
        <div className="container mx-auto px-4 sm:px-6 text-center">
          <h2 className="text-3xl sm:text-4xl font-bold text-white mb-6">
            Participe do Projeto
          </h2>
          <p className="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
            Faça parte desta transformação e prepare-se para o futuro do trabalho
          </p>
          <div className="flex flex-col sm:flex-row items-center justify-center gap-4">
            <button 
              onClick={() => setIsModalOpen(true)}
              className="w-full sm:w-auto bg-white text-blue-600 px-8 py-4 rounded-full font-medium hover:bg-blue-50 transition-colors"
            >
              Inscrever-se
            </button>
            <button 
              onClick={() => setIsInfoModalOpen(true)}
              className="w-full sm:w-auto bg-transparent text-white px-8 py-4 rounded-full font-medium border border-white hover:bg-white/10 transition-colors"
            >
              Saber Mais
            </button>
          </div>
        </div>
      </section>

      {/* Footer */}
      <footer className="bg-gray-900 text-white py-12">
        <div className="container mx-auto px-4 sm:px-6">
          <div className="grid grid-cols-2 md:grid-cols-4 gap-8">
            <div className="col-span-2 md:col-span-1">
              <div className="flex items-center mb-6">
                <Robot className="h-8 w-8" />
                <span className="ml-2 text-xl font-bold">Ed. Qualidade 4.0</span>
              </div>
              <p className="text-gray-400">
                Transformando a educação técnica para o futuro digital.
              </p>
            </div>
            <div>
              <h4 className="text-lg font-semibold mb-4">Projeto</h4>
              <ul className="space-y-2">
                <li><a href="#sobre" className="text-gray-400 hover:text-white transition-colors">Sobre</a></li>
                <li><a href="#objetivos" className="text-gray-400 hover:text-white transition-colors">Objetivos</a></li>
                <li><a href="#depoimentos" className="text-gray-400 hover:text-white transition-colors">Depoimentos</a></li>
              </ul>
            </div>
            <div>
              <h4 className="text-lg font-semibold mb-4">Recursos</h4>
              <ul className="space-y-2">
                <li><a href="#" className="text-gray-400 hover:text-white transition-colors">Material Didático</a></li>
                <li><a href="#" className="text-gray-400 hover:text-white transition-colors">Agenda</a></li>
                <li><a href="#" className="text-gray-400 hover:text-white transition-colors">FAQ</a></li>
              </ul>
            </div>
            <div>
              <h4 className="text-lg font-semibold mb-4">Contato</h4>
              <ul className="space-y-2">
                <li><a href="#" className="text-gray-400 hover:text-white transition-colors">Suporte</a></li>
                <li><a href="#" className="text-gray-400 hover:text-white transition-colors">Parcerias</a></li>
                <li><a href="#" className="text-gray-400 hover:text-white transition-colors">Newsletter</a></li>
              </ul>
            </div>
          </div>
          <div className="border-t border-gray-800 mt-10 pt-8 text-center text-gray-400">
            <p>&copy; 2025 Desenvolvido por Antonio Carlos Gomes. Todos os direitos reservados.</p>
          </div>
        </div>
      </footer>

      {/* WhatsApp Button */}
      {showWhatsApp && (
        <button
          onClick={handleWhatsAppClick}
          className="fixed bottom-6 right-6 bg-green-500 text-white p-4 rounded-full shadow-lg hover:bg-green-600 transition-all duration-300 animate-fade-in z-50 flex items-center gap-2"
        >
          <MessageCircle className="h-6 w-6" />
          <span className="hidden md:inline">Fale Conosco</span>
        </button>
      )}

      {/* Contact Modal */}
      <Modal
        isOpen={isModalOpen}
        onRequestClose={() => setIsModalOpen(false)}
        style={modalStyles}
        contentLabel="Formulário de Contato"
      >
        <div className="relative">
          <button
            onClick={() => setIsModalOpen(false)}
            className="absolute top-0 right-0 p-2"
          >
            <X className="h-6 w-6 text-gray-400 hover:text-gray-600" />
          </button>
          <h2 className="text-2xl font-bold mb-6">Participar do Projeto</h2>
          {submitSuccess ? (
            <div className="text-center py-8">
              <CheckCircle2 className="h-16 w-16 text-green-500 mx-auto mb-4" />
              <p className="text-lg font-medium text-gray-900">Mensagem enviada com sucesso!</p>
              <p className="text-gray-600">Entraremos em contato em breve.</p>
            </div>
          ) : (
            <form onSubmit={handleFormSubmit} className="space-y-4">
              <div>
                <label htmlFor="name" className="block text-sm font-medium text-gray-700 mb-1">
                  Nome
                </label>
                <input
                  type="text"
                  id="name"
                  value={formData.name}
                  onChange={(e) => setFormData({ ...formData, name: e.target.value })}
                  className="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                  required
                />
              </div>
              <div>
                <label htmlFor="email" className="block text-sm font-medium text-gray-700 mb-1">
                  Email
                </label>
                <input
                  type="email"
                  id="email"
                  value={formData.email}
                  onChange={(e) => setFormData({ ...formData, email: e.target.value })}
                  className="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                  required
                />
              </div>
              <div>
                <label htmlFor="message" className="block text-sm font-medium text-gray-700 mb-1">
                  Mensagem
                </label>
                <textarea
                  id="message"
                  value={formData.message}
                  onChange={(e) => setFormData({ ...formData, message: e.target.value })}
                  className="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                  rows={4}
                  required
                />
              </div>
              <button
                type="submit"
                className="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors flex items-center justify-center gap-2"
              >
                <Send className="h-5 w-5" />
                Enviar Mensagem
              </button>
            </form>
          )}
        </div>
      </Modal>

      {/* Testimonial Modal */}
      <Modal
        isOpen={isTestimonialModalOpen}
        onRequestClose={() => setIsTestimonialModalOpen(false)}
        style={modalStyles}
        contentLabel="Deixar Depoimento"
      >
        <div className="relative">
          <button
            onClick={() => setIsTestimonialModalOpen(false)}
            className="absolute top-0 right-0 p-2"
          >
            <X className="h-6 w-6 text-gray-400 hover:text-gray-600" />
          </button>
          <h2 className="text-2xl font-bold mb-6">Deixe seu Depoimento</h2>
          <form onSubmit={handleTestimonialSubmit} className="space-y-4">
            <div>
              <label htmlFor="testimonial-name" className="block text-sm font-medium text-gray-700 mb-1">
                Nome
              </label>
              <input
                type="text"
                id="testimonial-name"
                value={testimonialForm.name}
                onChange={(e) => setTestimonialForm({ ...testimonialForm, name: e.target.value })}
                className="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                required
              />
            </div>
            <div>
              <label htmlFor="testimonial-role" className="block text-sm font-medium text-gray-700 mb-1">
                Cargo/Função
              </label>
              <input
                type="text"
                id="testimonial-role"
                value={testimonialForm.role}
                onChange={(e) => setTestimonialForm({ ...testimonialForm, role: e.target.value })}
                className="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                required
              />
            </div>
            <div>
              <label htmlFor="testimonial-message" className="block text-sm font-medium text-gray-700 mb-1">
                Seu Depoimento
              </label>
              <textarea
                id="testimonial-message"
                value={testimonialForm.message}
                onChange={(e) => setTestimonialForm({ ...testimonialForm, message: e.target.value })}
                className="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                rows={4}
                required
              />
            </div>
            <button
              type="submit"
              className="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors flex items-center justify-center gap-2"
            >
              <Send className="h-5 w-5" />
              Enviar Depoimento
            </button>
          </form>
        </div>
      </Modal>

      {/* Info Modal */}
      <Modal
        isOpen={isInfoModalOpen}
        onRequestClose={() => setIsInfoModalOpen(false)}
        style={modalStyles}
        contentLabel="Mais Informações"
      >
        <div className="relative">
          <button
            onClick={() => setIsInfoModalOpen(false)}
            className="absolute top-0 right-0 p-2"
          >
            <X className="h-6 w-6 text-gray-400 hover:text-gray-600" />
          </button>
          <h2 className="text-2xl font-bold mb-6">Sobre o Projeto</h2>
          <div className="prose prose-blue">
            <p className="text-gray-600 mb-4">
              Este projeto de extensão tem como objetivo principal introduzir e discutir os conceitos e impactos da Indústria 4.0 na comunidade escolar, preparando alunos, professores e equipe para os desafios e oportunidades do mercado de trabalho do futuro.
            </p>
            <h3 className="text-xl font-semibold mb-3">Principais Atividades</h3>
            <ul className="list-disc pl-5 space-y-2 text-gray-600 mb-4">
              <li>Workshops práticos sobre tecnologias da Indústria 4.0</li>
              <li>Palestras com profissionais do mercado</li>
              <li>Material didático digital atualizado</li>
              <li>Projetos práticos e demonstrações</li>
            </ul>
            <h3 className="text-xl font-semibold mb-3">Benefícios</h3>
            <ul className="list-disc pl-5 space-y-2 text-gray-600">
              <li>Conhecimento atualizado sobre tecnologias emergentes</li>
              <li>Desenvolvimento de competências digitais</li>
              <li>Networking com profissionais da área</li>
              <li>Certificado de participação</li>
            </ul>
          </div>
        </div>
      </Modal>
    </div>
  );
}

export default App;