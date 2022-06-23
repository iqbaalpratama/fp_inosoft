export default {
    InvoiceInstruction: {
        vendor_name: [
            {
                text: 'Amarit & Associates Logistic Co Ltd'
            },
            {
                text: 'Alphatrans Pte. Ltd.'
            }
        ],
        vendor_address:[
            {
                text: '1 SOI PRIDI PHANOMYONG 28 (THANIPATTANA) SUKHUMVIT 71 ROAD, KWAENG KLONGTON NUA, KHET WATTANA'
            },
            {
                text: '217 Henderson Rd, #04-07, Singapore 159555'
            }
        ],
        invoice_to: [
            {
                text: 'Marubeni-itochu Tubulars Asia Pte Ltd, 2 Shenton Way #07-02, SGX Centre 1, Singapore 068804'
            }
        ],
        customer_contract: [
            {
                id: 'ADNOC',
                text: 'Hail & Gasha'
            },
            {
                id: 'ABSOX',
                text: 'Sour Gas'
            }
        ],
        TypeInstruction: [
          {
            id: 'LI',
            name: 'Logistic Instruction',
            icon: 'mdi-truck'
          },
          {
            id: 'SI',
            name: 'Service Instruction',
            icon: 'mdi-human-male-board-poll',
          },      
        ],
        ItemsLink:[
            {
              text: "ASL-DSL-001"
            }
        ],
        ItemsUOM: [
            {
              text: "SHP",
            },
            {
              text: "SDC"
            }
        ],
        ItemsCurrency: [
            {
              text: "USD",
            },
            {
              text: "AED"
            }
        ],
        ItemsCharge:[
            {
              text: "MITME"
            },
            {
              text: "Customer"
            }
        ],
        items: [
          {
            text: 'Vendor Management',
            disabled: true,
            href: 'breadcrumbs_dashboard',
          },
          {
            text: '3rd Party Instruction',
            disabled: false,
            href: 'breadcrumbs_link_1',
          },
        ],
    }    
}


