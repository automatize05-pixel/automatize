<?php 
include '../includes/header.php'; 

$service_id = isset($_GET['service']) ? $_GET['service'] : '';

$services = [
    'website' => [
        'title' => 'Criação de Sites Institucionais',
        'desc' => 'Transforme visitantes em clientes com um site otimizado, de carregamento rápido e design premium.',
        'icon' => 'fa-laptop-code'
    ],
    'landing' => [
        'title' => 'Landing Pages de Alta Conversão',
        'desc' => 'Focadas num único objetivo: vender seu produto ou capturar o contato do seu potencial cliente.',
        'icon' => 'fa-rocket'
    ],
    'ecommerce' => [
        'title' => 'Lojas Virtuais',
        'desc' => 'Plataformas de E-commerce prontas para escalar seu faturamento e gerenciar produtos facilmente.',
        'icon' => 'fa-shopping-cart'
    ],
    'auto' => [
        'title' => 'Automação e Chatbots',
        'desc' => 'Reduza custos operacionais. Integramos IA ao seu WhatsApp Comercial para atendimento 24 horas por dia.',
        'icon' => 'fa-robot'
    ],
    'webapp' => [
        'title' => 'Aplicações Web',
        'desc' => 'Sistemas sob medida projetados e focados inteiramente no fluxo das regras do seu negócio.',
        'icon' => 'fa-code'
    ],
    'saas' => [
        'title' => 'Plataformas Completas',
        'desc' => 'De marketplaces a produtos SaaS, damos vida ao seu modelo de negócio completo na internet.',
        'icon' => 'fa-cloud'
    ]
];

$default = [
    'title' => 'Soluções Digitais Customizadas',
    'desc' => 'Oferecemos o que há de mais moderno em tecnologia para ajudar o seu negócio a crescer no digital.',
    'icon' => 'fa-cogs'
];

$service = isset($services[$service_id]) ? $services[$service_id] : $default;
?>

<section class="page-header">
    <div class="container animate-on-scroll">
        <div style="font-size: 3rem; color: var(--primary); margin-bottom: 20px;">
            <i class="fas <?php echo $service['icon']; ?>"></i>
        </div>
        <h1><?php echo htmlspecialchars($service['title']); ?></h1>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="text-center animate-on-scroll" style="max-width: 800px; margin: 0 auto;">
            <p style="font-size: 1.25rem; font-weight: 500; color: var(--dark); margin-bottom: 40px;">
                <?php echo htmlspecialchars($service['desc']); ?>
            </p>
            <div style="padding: 40px; background-color: var(--gray-light); border-radius: 8px; margin-bottom: 40px;">
                <h3 style="margin-bottom: 20px;">Por que escolher a Automatize+?</h3>
                <ul style="text-align: left; max-width: 400px; margin: 0 auto; display: flex; flex-direction: column; gap: 15px;">
                    <li><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 10px;"></i> Tecnologia Avançada e Rápida</li>
                    <li><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 10px;"></i> Foco Total em UI/UX Design Premium</li>
                    <li><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 10px;"></i> Estratégia de Conversão Ativa</li>
                    <li><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 10px;"></i> Suporte Dedicado em Angola</li>
                </ul>
            </div>
            
            <a href="https://wa.me/244935043421?text=Olá,%20tenho%20interesse%20no%20serviço%20de%20<?php echo urlencode($service['title']); ?>." class="btn btn-primary" target="_blank">Falar com Consultor no WhatsApp</a>
        </div>
    </div>
</section>

<?php include '../includes/footer.php'; ?>
