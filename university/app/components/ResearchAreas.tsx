"use client"

import { motion } from "framer-motion"

const researchAreas = [
  {
    title: "Artificial Intelligence and Machine Learning",
    description: "Developing intelligent systems and algorithms for real-world applications.",
  },
  {
    title: "Renewable Energy and Sustainability",
    description: "Exploring innovative solutions for clean energy and environmental conservation.",
  },
  {
    title: "Biomedical Engineering",
    description: "Advancing healthcare through cutting-edge medical technologies and treatments.",
  },
  {
    title: "Quantum Computing",
    description: "Pushing the boundaries of computation with quantum mechanics principles.",
  },
  {
    title: "Climate Change and Environmental Science",
    description: "Studying the impacts of climate change and developing mitigation strategies.",
  },
  {
    title: "Neuroscience and Brain-Computer Interfaces",
    description: "Unraveling the mysteries of the brain and creating novel human-computer interactions.",
  },
]

const ResearchAreas = () => {
  return (
    <section className="py-12">
      <h2 className="text-3xl font-bold text-center mb-8">Research Areas</h2>
      <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        {researchAreas.map((area, index) => (
          <motion.div
            key={area.title}
            className="bg-white rounded-lg shadow-lg p-6"
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.5, delay: index * 0.1 }}
          >
            <h3 className="text-xl font-semibold mb-2">{area.title}</h3>
            <p className="text-gray-600">{area.description}</p>
          </motion.div>
        ))}
      </div>
    </section>
  )
}

export default ResearchAreas

