"use client"

import { motion } from "framer-motion"
import Image from "next/image"

const projects = [
  {
    title: "Smart City Infrastructure",
    description: "Developing IoT-based solutions for efficient urban management and sustainability.",
    image: "/smart-city-project.jpg",
  },
  {
    title: "Cancer Detection AI",
    description: "Using machine learning algorithms to improve early cancer detection and diagnosis.",
    image: "/cancer-detection-project.jpg",
  },
  {
    title: "Quantum Cryptography",
    description: "Developing unbreakable encryption methods using quantum mechanical principles.",
    image: "/quantum-cryptography-project.jpg",
  },
]

const FeaturedProjects = () => {
  return (
    <section className="py-12">
      <h2 className="text-3xl font-bold text-center mb-8">Featured Research Projects</h2>
      <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        {projects.map((project, index) => (
          <motion.div
            key={project.title}
            className="bg-white rounded-lg shadow-lg overflow-hidden"
            initial={{ opacity: 0, scale: 0.9 }}
            animate={{ opacity: 1, scale: 1 }}
            transition={{ duration: 0.5, delay: index * 0.1 }}
          >
            <Image
              src={project.image || "/placeholder.svg"}
              alt={project.title}
              width={400}
              height={250}
              className="w-full h-48 object-cover"
            />
            <div className="p-4">
              <h3 className="text-xl font-semibold mb-2">{project.title}</h3>
              <p className="text-gray-600">{project.description}</p>
            </div>
          </motion.div>
        ))}
      </div>
    </section>
  )
}

export default FeaturedProjects

