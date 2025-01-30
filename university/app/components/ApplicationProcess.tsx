"use client"

import { motion } from "framer-motion"
import { Search, Edit, CheckCircle, CreditCard } from "lucide-react"

const steps = [
  { icon: Search, title: "Discover Programmes" },
  { icon: Edit, title: "Submit Application" },
  { icon: CheckCircle, title: "Track Admission Status" },
  { icon: CreditCard, title: "Register Online" },
]

const ApplicationProcess = () => {
  return (
    <section className="py-16 bg-white">
      <div className="container mx-auto px-4">
        <h2 className="text-3xl font-bold text-center mb-8">Application Process</h2>
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
          {steps.map((step, index) => (
            <motion.div
              key={index}
              className="bg-gray-100 rounded-lg p-6 text-center"
              whileHover={{ scale: 1.05, backgroundColor: "#3B82F6", color: "#FFFFFF" }}
              transition={{ duration: 0.3 }}
            >
              <step.icon className="w-12 h-12 mx-auto mb-4" />
              <h3 className="text-xl font-semibold">{step.title}</h3>
            </motion.div>
          ))}
        </div>
      </div>
    </section>
  )
}

export default ApplicationProcess

