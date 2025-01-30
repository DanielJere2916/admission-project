"use client"

import { motion } from "framer-motion"
import Image from "next/image"

const facilities = [
  {
    name: "Advanced Computing Center",
    description: "State-of-the-art computing facilities for high-performance simulations and data analysis.",
    image: "/computing-center.jpg",
  },
  {
    name: "Nanotechnology Lab",
    description: "Cutting-edge equipment for nanoscale research and material development.",
    image: "/nanotech-lab.jpg",
  },
  {
    name: "Biomedical Research Center",
    description: "Modern laboratories for groundbreaking medical research and drug development.",
    image: "/biomedical-center.jpg",
  },
]

const ResearchFacilities = () => {
  return (
    <section className="py-12">
      <h2 className="text-3xl font-bold text-center mb-8">Research Facilities</h2>
      <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        {facilities.map((facility, index) => (
          <motion.div
            key={facility.name}
            className="bg-white rounded-lg shadow-lg overflow-hidden"
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.5, delay: index * 0.1 }}
          >
            <Image
              src={facility.image || "/placeholder.svg"}
              alt={facility.name}
              width={400}
              height={250}
              className="w-full h-48 object-cover"
            />
            <div className="p-4">
              <h3 className="text-xl font-semibold mb-2">{facility.name}</h3>
              <p className="text-gray-600">{facility.description}</p>
            </div>
          </motion.div>
        ))}
      </div>
    </section>
  )
}

export default ResearchFacilities

